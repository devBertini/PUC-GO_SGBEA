<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaboratorHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'collaborator_id', 
        'collaborator_type_id', 
        'start_date', 
        'end_date'
    ];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }

    public function type()
    {
        return $this->belongsTo(CollaboratorType::class, 'collaborator_type_id');
    }
}
