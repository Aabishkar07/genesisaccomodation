<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;

    protected $table = 'display';

    protected $fillable = [
        'name',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Get display status for a specific section
     */
    public static function getStatus($name)
    {
        $display = self::where('name', $name)->first();
        return $display ? $display->status : false;
    }

    /**
     * Set display status for a specific section
     */
    public static function setStatus($name, $status)
    {
        return self::updateOrCreate(
            ['name' => $name],
            ['status' => $status]
        );
    }
}
