<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    use HasFactory;
    protected $tables = 'colours';
    protected $primarykey = 'id';
    protected $fillable = ['name'];


    public function powder()
    {
        return $this->hasMany(Powder::class);
    }
}
