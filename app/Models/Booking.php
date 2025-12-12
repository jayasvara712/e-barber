<?php

namespace App\Models;

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

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }
}
