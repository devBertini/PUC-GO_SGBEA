<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'copy_id', 
        'collaborator_id', 
        'reservation_date', 
        'limit_date', 
        'reservation_status_id'
    ];

    public function copy()
    {
        return $this->belongsTo(Copy::class);
    }

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }

    public function status()
    {
        return $this->belongsTo(ReservationStatus::class, 'reservation_status_id');
    }
}
