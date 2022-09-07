<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ships extends Model
{
    use HasFactory;
    protected $table = "ships";

    public function purchase_requests(){
        return $this->hasMany(PurchaseRequest::class, "ships_id", "id");
    }
}
