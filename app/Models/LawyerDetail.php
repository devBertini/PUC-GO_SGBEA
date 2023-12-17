<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'collaborator_id', 
        'oab_number'
    ];

    public $timestamps = false;

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }
}
