<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $primarykey = "id";
    protected $fillable = [
        "vendor"
    ];
    public function supplier(){
        return $this->hasMany(powder::class, 'suppliers_id', 'id');
    }
}
