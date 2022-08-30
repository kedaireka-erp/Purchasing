<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuans';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'unit',
        'created_at',
        'updated_at'
    ];
}
