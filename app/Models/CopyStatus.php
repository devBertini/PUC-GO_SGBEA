<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }
}
