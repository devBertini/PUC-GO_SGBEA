<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'status', 
        'collaborator_type_id'
    ];

    public function type()
    {
        return $this->belongsTo(CollaboratorType::class, 'collaborator_type_id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function lawyerDetail()
    {
        return $this->hasOne(LawyerDetail::class);
    }

    public function history()
    {
        return $this->hasMany(CollaboratorHistory::class);
    }
}
