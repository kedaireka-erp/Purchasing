<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;

    protected $table = "notifications";

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_request',
        'role',
        'message',
        'status',
    ];
    public function purchases(){
        return $this->belongsTo(PurchaseRequest::class,'id_request');
    }
}
