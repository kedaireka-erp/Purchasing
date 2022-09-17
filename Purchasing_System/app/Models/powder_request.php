<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class powder_request extends Model
{
    use HasFactory;

    protected $table = 'powder_requests';
    protected $primaryKey = 'id';
    protected $fillable = ['id_request, id_powder'];
}
