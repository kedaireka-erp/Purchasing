<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Item extends Model
{
    use HasFactory;
    protected $table = 'master_items';
    protected $primaryKey = 'id';
    protected $fillable = ['item_name'];

    //Satu id master item bisa dipakai dalam banyak item PR
    public function item()
    {
        return $this->hasMany(Item::class,'id_master_item','id');
    }
}
