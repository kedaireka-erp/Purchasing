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
    public function powder(){
        return $this->hasMany(Powder::class, 'suppliers_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_supplier', 'id');
    }
}
