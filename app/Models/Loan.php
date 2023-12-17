<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'copy_id', 
        'collaborator_id', 
        'loan_date', 
        'expected_return_date', 
        'actual_return_date', 
        'loan_status_id', 
        'fine'
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
        return $this->belongsTo(LoanStatus::class, 'loan_status_id');
    }
}
