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
        "type"
    ];

    public function grade(){
        return $this->hasMany(Powder::class, 'id_grade', 'id');
    }
}
