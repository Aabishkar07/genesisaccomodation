<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function dashboard()
    {
        $user = Auth::guard('customer')->user();
        $bookings = Booking::with('accommodation')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $stats = [
            'total_bookings' => Booking::where('user_id', $user->id)->count(),
            'pending_bookings' => Booking::where('user_id', $user->id)->where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('user_id', $user->id)->where('status', 'confirmed')->count(),
            'completed_bookings' => Booking::where('user_id', $user->id)->where('status', 'completed')->count(),
            'cancelled_bookings' => Booking::where('user_id', $user->id)->where('status', 'cancelled')->count(),
            'total_spent' => Booking::where('user_id', $user->id)
                ->where('status', 'completed')
                ->sum('total_amount'),
            'upcoming_bookings' => Booking::where('user_id', $user->id)
                ->where('status', 'confirmed')
                ->where('check_in', '>=', now())
                ->count(),
        ];

        // Get recent bookings with admin notes
        $recentBookings = Booking::with('accommodation')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('user.dashboard', compact('bookings', 'stats', 'recentBookings'));
    }

    public function bookings(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $query = Booking::with('accommodation')
            ->where('user_id', $user->id);

        // Apply filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('check_in', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('check_out', '<=', $request->date_to);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('accommodation', function($subQ) use ($search) {
                    $subQ->where('name', 'like', "%{$search}%")
                         ->orWhere('city', 'like', "%{$search}%");
                })
                ->orWhere('full_name', 'like', "%{$search}%");
            });
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);

        // Get booking statistics for the current user
        $stats = [
            'total_bookings' => Booking::where('user_id', $user->id)->count(),
            'pending_bookings' => Booking::where('user_id', $user->id)->where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('user_id', $user->id)->where('status', 'confirmed')->count(),
            'completed_bookings' => Booking::where('user_id', $user->id)->where('status', 'completed')->count(),
            'cancelled_bookings' => Booking::where('user_id', $user->id)->where('status', 'cancelled')->count(),
        ];

        return view('user.bookings', compact('bookings', 'stats'));
    }

    public function bookingDetails($id)
    {
        $booking = Booking::with('accommodation')
            ->where('user_id', Auth::guard('customer')->id())
            ->findOrFail($id);

        return view('user.booking-details', compact('booking'));
    }

    public function profile()
    {
        $user = Auth::guard('customer')->user();
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customer_registrations,email,' . $user->id,
            'phonenumber' => 'nullable|string|max:20',
        ]);

        $user->update($validated);

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }

    public function changePassword()
    {
        return view('user.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::guard('customer')->user();

        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                'confirmed'
            ],
        ], [
            'new_password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.'
        ]);

        // Check if current password is correct
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($validated['new_password'])
        ]);

        return redirect()->route('user.change-password')->with('success', 'Password changed successfully!');
    }

    public function cancelBooking($id)
    {
        $booking = Booking::with('accommodation')
            ->where('user_id', Auth::guard('customer')->id())
            ->findOrFail($id);

        // Check if booking can be cancelled
        if ($booking->status === 'cancelled') {
            return redirect()->back()->with('error', 'This booking is already cancelled.');
        }

        if ($booking->status === 'completed') {
            return redirect()->back()->with('error', 'Cannot cancel a completed booking.');
        }

        // Check if cancellation is allowed (e.g., at least 24 hours before check-in)
        $checkInDate = \Carbon\Carbon::parse($booking->check_in);
        $now = \Carbon\Carbon::now();

        if ($checkInDate->diffInHours($now) < 24) {
            return redirect()->back()->with('error', 'Bookings can only be cancelled at least 24 hours before check-in.');
        }

        // Update booking status to cancelled
        $booking->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
            'cancellation_reason' => 'Cancelled by user'
        ]);

        return redirect()->route('user.bookings')->with('success', 'Booking cancelled successfully.');
    }
}
