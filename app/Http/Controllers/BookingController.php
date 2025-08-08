<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request, Accommodation $accommodation)
    {
        // Check if user is authenticated
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login')->with('error', 'Please login to make a booking.');
        }

        // Validate the request
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'check_in' => [
                'required',
                'date',
                'after_or_equal:' . Carbon::now()->addWeeks(8)->format('Y-m-d')
            ],
            'check_out' => [
                'required',
                'date',
                'after:check_in',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->check_in) {
                        $checkIn = Carbon::parse($request->check_in);
                        $checkOut = Carbon::parse($value);
                        $minCheckOut = $checkIn->addWeeks(8);

                        if ($checkOut->lt($minCheckOut)) {
                            $fail('Check-out date must be at least 8 weeks after check-in date.');
                        }
                    }
                }
            ],
            'room_capacity' => [
                'required',
                'integer',
                'min:1',
                'max:' . ($accommodation->max_guest ?? 1)
            ],
            'pickup' => 'required|in:yes,no',
            'arrival_date' => 'required_if:pickup,yes|nullable|date|after_or_equal:today',
            'arrival_time' => 'required_if:pickup,yes|nullable|date_format:H:i',
            'special_requests' => 'nullable|string|max:1000'
        ], [
            'check_in.after_or_equal' => 'Check-in date must be at least 8 weeks from today.',
            'room_capacity.max' => 'Room capacity cannot exceed ' . ($accommodation->max_guest ?? 1) . ' guests.',
            'arrival_date.required_if' => 'Arrival date is required when pickup service is selected.',
            'arrival_time.required_if' => 'Arrival time is required when pickup service is selected.'
        ]);

        // Calculate total amount
        $checkIn = Carbon::parse($validated['check_in']);
        $checkOut = Carbon::parse($validated['check_out']);
        $totalNights = $checkIn->diffInDays($checkOut);
        $totalAmount = $totalNights * ($accommodation->price ?? 0);

        // Create the booking
        $booking = Booking::create([
            'user_id' => Auth::guard('customer')->id(),
            'accommodation_id' => $accommodation->id,
            'full_name' => $validated['full_name'],
            'phone_number' => $validated['phone_number'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'room_capacity' => $validated['room_capacity'],
            'pickup' => $validated['pickup'],
            'arrival_date' => $validated['pickup'] === 'yes' ? $validated['arrival_date'] : null,
            'arrival_time' => $validated['pickup'] === 'yes' ? $validated['arrival_time'] : null,
            'special_requests' => $validated['special_requests'],
            'total_amount' => $totalAmount,
            'status' => 'pending'
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Booking submitted successfully! We will contact you soon.');
    }
}
