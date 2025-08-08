<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Accommodation;
use App\Models\CustomerRegistration;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Get booking statistics
        $bookingStats = [
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('status', 'confirmed')->count(),
            'completed_bookings' => Booking::where('status', 'completed')->count(),
            'cancelled_bookings' => Booking::where('status', 'cancelled')->count(),
            'today_bookings' => Booking::whereDate('created_at', today())->count(),
            'this_month_bookings' => Booking::whereMonth('created_at', now()->month)->count(),
            'this_month_revenue' => Booking::where('status', 'completed')
                ->whereMonth('created_at', now()->month)
                ->sum('total_amount'),
        ];

        // Get other statistics
        $generalStats = [
            'total_accommodations' => Accommodation::count(),
            'total_customers' => CustomerRegistration::count(),
            'total_contacts' => Contact::count(),
        ];

        // Get recent bookings
        $recentBookings = Booking::with(['user', 'accommodation'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get pending bookings that need attention
        $pendingBookings = Booking::with(['user', 'accommodation'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view("admin.dashboard.index", compact(
            'bookingStats',
            'generalStats',
            'recentBookings',
            'pendingBookings'
        ));
    }
}
