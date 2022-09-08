<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    protected $table = 'prefixes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'prefix',
        'divisi',
        'created_at',
        'updated_at'
    ];

    public function purchase_requests(){
        return $this->hasMany(PurchaseRequest::class, "prefixes_id", "id");
    }
}