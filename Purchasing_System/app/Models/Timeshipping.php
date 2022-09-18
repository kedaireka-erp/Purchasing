<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeshipping extends Model
{
    use HasFactory;
    protected $table = 'timeshippings';
    protected $primarykey = 'id';
    protected $fillable = ['name'];
}
