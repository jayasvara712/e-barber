<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'barber_id',
        'customer_name',
        'customer_phone',
        'date',
        'time',
        'status',
        'notes'
    ];

    protected $casts = [
        'date' => 'date',     // or 'date'
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    public function getDateTimeAttribute()
    {
        return Carbon::parse($this->date->format('Y-m-d') . ' ' . $this->time);
    }
}
