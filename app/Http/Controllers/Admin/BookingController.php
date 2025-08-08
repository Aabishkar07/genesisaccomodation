<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'accommodation']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('check_in', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('check_out', '<=', $request->date_to);
        }

        // Search by customer name or accommodation name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhereHas('accommodation', function ($subQ) use ($search) {
                      $subQ->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get booking statistics
        $stats = [
            'total' => Booking::count(),
            'pending' => Booking::where('status', 'pending')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
        ];

        return view('admin.bookings.index', compact('bookings', 'stats'));
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        $booking->load(['user', 'accommodation']);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Update the booking status.
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
            'admin_notes' => 'nullable|string|max:1000'
        ]);

        $oldStatus = $booking->status;

        $booking->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes
        ]);

        // Log the status change
        DB::table('booking_status_logs')->insert([
            'booking_id' => $booking->id,
            'old_status' => $oldStatus,
            'new_status' => $request->status,
            'changed_by' => 'admin', // You can get actual admin user if you have auth
            'notes' => $request->admin_notes,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Booking status updated successfully.');
    }

    /**
     * Approve a booking (change status to confirmed).
     */
    public function approve(Booking $booking)
    {
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending bookings can be approved.');
        }

        $booking->update(['status' => 'confirmed']);

        // Log the status change
        DB::table('booking_status_logs')->insert([
            'booking_id' => $booking->id,
            'old_status' => 'pending',
            'new_status' => 'confirmed',
            'changed_by' => 'admin',
            'notes' => 'Booking approved by admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Booking approved successfully.');
    }

    /**
     * Reject a booking (change status to cancelled).
     */
    public function reject(Request $request, Booking $booking)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500'
        ]);

        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending bookings can be rejected.');
        }

        $booking->update([
            'status' => 'cancelled',
            'cancellation_reason' => $request->rejection_reason,
            'cancelled_at' => now()
        ]);

        // Log the status change
        DB::table('booking_status_logs')->insert([
            'booking_id' => $booking->id,
            'old_status' => 'pending',
            'new_status' => 'cancelled',
            'changed_by' => 'admin',
            'notes' => 'Booking rejected by admin: ' . $request->rejection_reason,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Booking rejected successfully.');
    }

    /**
     * Get booking statistics for dashboard.
     */
    public function getStats()
    {
        return [
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'completed_bookings' => Booking::where('status', 'completed')->count(),
            'cancelled_bookings' => Booking::where('status', 'cancelled')->count(),
            'today_bookings' => Booking::whereDate('created_at', today())->count(),
            'this_month_revenue' => Booking::where('status', 'completed')
                ->whereMonth('created_at', now()->month)
                ->sum('total_amount'),
        ];
    }

    /**
     * Export bookings to CSV.
     */
    public function export(Request $request)
    {
        $query = Booking::with(['user', 'accommodation']);

        // Apply same filters as index
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('check_in', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('check_out', '<=', $request->date_to);
        }

        $bookings = $query->orderBy('created_at', 'desc')->get();

        $filename = 'bookings_' . now()->format('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function() use ($bookings) {
            $file = fopen('php://output', 'w');

            // CSV headers
            fputcsv($file, [
                'ID', 'Customer Name', 'Phone', 'Accommodation', 'Check In', 'Check Out',
                'Guests', 'Total Amount', 'Status', 'Booking Date', 'Special Requests'
            ]);

            // CSV data
            foreach ($bookings as $booking) {
                fputcsv($file, [
                    $booking->id,
                    $booking->full_name,
                    $booking->phone_number,
                    $booking->accommodation->name ?? 'N/A',
                    $booking->check_in->format('Y-m-d'),
                    $booking->check_out->format('Y-m-d'),
                    $booking->room_capacity,
                    $booking->total_amount,
                    ucfirst($booking->status),
                    $booking->created_at->format('Y-m-d H:i:s'),
                    $booking->special_requests ?? ''
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
