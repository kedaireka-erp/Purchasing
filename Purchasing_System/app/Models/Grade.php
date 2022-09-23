<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $tables = "grades";
    protected $primarykey = "id";
    protected $fillable = [
        "type",
        "grade_powder", 
        "sieve_no_all",
        "sieve_no_half",
        "note"
    ];

    public function grade(){
        return $this->hasMany(powder::class, 'grades_id', 'id');
    }
}
