<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'accommodation_id',
        'full_name',
        'phone_number',
        'check_in',
        'check_out',
        'room_capacity',
        'pickup',
        'arrival_date',
        'arrival_time',
        'special_requests',
        'admin_notes',
        'status',
        'total_amount',
        'cancelled_at',
        'cancellation_reason'
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'arrival_date' => 'date',
        'arrival_time' => 'datetime:H:i',
        'total_amount' => 'decimal:2',
        'cancelled_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(CustomerRegistration::class, 'user_id');
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }

    // Accessor for status badge classes
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => 'bg-yellow-100 text-yellow-800',
            'confirmed' => 'bg-green-100 text-green-800',
            'completed' => 'bg-blue-100 text-blue-800',
            'cancelled' => 'bg-red-100 text-red-800',
            default => 'bg-gray-100 text-gray-800'
        };
    }

    // Accessor for total nights
    public function getTotalNightsAttribute()
    {
        return $this->check_in->diffInDays($this->check_out);
    }

    // Check if booking can be cancelled
    public function canBeCancelled()
    {
        // Cannot cancel if already cancelled or completed
        if (in_array($this->status, ['cancelled', 'completed'])) {
            return false;
        }

        // Cannot cancel if check-in is within 24 hours
        $checkInDate = \Carbon\Carbon::parse($this->check_in);
        $now = \Carbon\Carbon::now();

        return $checkInDate->diffInHours($now) >= 24;
    }
}
