<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Item extends Model
{
    use HasFactory;
    protected $table = 'master_items';
    protected $fillable = ['item_name'];
}
