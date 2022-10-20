<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_master_item',
        'stok',
        'id_satuan',
        'id_request',
        'tanggal_kedatangan_barang',
        'outstanding',
        'sudah_datang'
    ];


    //Satu item PR itu bisa dipakai untuk beberapa PR
    public function purchase()
    {
        return $this->belongsToMany(PurchaseRequest::class, 'item_requests','id_request','id_item');
    }
    public function order(){
        return $this->belongsToMany(Order::class, 'item_requests','id_item', 'order_id');
    }
    //Tiap Satu item PR dapat memuat maksimal 1 id dalam master item
    public function master_item()
    {
        return $this->belongsTo(Master_Item::class,'id_master_item');
    }

    //Tiap satu item PR dapat memuat maksimal 1 satuan
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function item_request()
    {
        return $this->hasMany(ItemRequest::class,'id');
    }

    public static function boot()
    {
        // parent::boot();

        // static::creating(function($item){
        //     $item->outstanding = $item->stok - $item->sudah_datang;
        // });
        // static::updating(function ($item) {
        //     $item->outstanding = $item->stok - $item->sudah_datang;

        //     // $item->outstanding = $item->outstanding - $item->sudah_datang;
        //     // $item->sudah_datang = $item->stok-$item->outstanding;

        // });
        parent::boot();

        static::creating(function($item){
            $item->outstanding = $item->stok ;
        });
        static::updating(function ($item) {
            $item->outstanding = $item->stok - $item->sudah_datang;
        });
    }
    
}
