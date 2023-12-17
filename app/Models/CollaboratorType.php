<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaboratorType extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }
}
