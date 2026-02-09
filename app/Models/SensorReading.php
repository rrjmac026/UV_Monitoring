<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorReading extends Model
{
    // Table name (optional if it follows Laravel convention)
    protected $table = 'sensor_readings';

    // Fillable fields for mass assignment
    protected $fillable = [
        'water_level',
        'ip_address',
    ];

    // Enable timestamps (created_at, updated_at)
    public $timestamps = true;

    // Cast attributes to specific types
    protected $casts = [
        'water_level' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Optional: Accessor for formatted water level
    public function getFormattedWaterLevelAttribute()
    {
        return number_format($this->water_level, 2) . '%';
    }

    // Optional: Scope for recent readings
    public function scopeRecent($query, $minutes = 60)
    {
        return $query->where('created_at', '>=', now()->subMinutes($minutes));
    }

    // Optional: Scope for critical levels
    public function scopeCriticalLevel($query, $threshold = 20)
    {
        return $query->where('water_level', '<=', $threshold);
    }
}