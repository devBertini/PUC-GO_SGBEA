<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'publisher_id', 
        'year', 
        'edition', 
        'acquisition_date', 
        'cost'
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function lawAreas()
    {
        return $this->belongsToMany(LawArea::class, 'book_law_area');
    }

    public function copies()
    {
        return $this->hasMany(Copy::class);
    }
}
