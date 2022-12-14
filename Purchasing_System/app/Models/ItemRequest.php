<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    use HasFactory;

    protected $table = 'item_requests';
    protected $primaryKey = 'id';
    protected $fillable = ['id_request, id_item, order_id, powder_id' ];
    
    public function purchase()
    {
        // return $this->belongsToMany(PurchaseRequest::class, 'item_requests','id_request');
        return $this->belongsTo(PurchaseRequest::class, 'id_request');
    }

    public function purchase1()
    {
        // return $this->belongsToMany(PurchaseRequest::class, 'item_requests','id_request');
        return $this->belongsToMany(PurchaseRequest::class, 'item_requests','id','id_item');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'id_item');
        
    }
    public function powder(){
        return $this->belongsTo(Powder::class, 'powder_id');
        
    }
    public function powder1(){
        return $this->belongsToMany(Powder::class, 'item_requests','id_request','powder_id');
        
    }
    
    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function Timeshipping()
    {
        return $this->belongsTo(Timeshipping::class, 'id_waktu');
    }
    public function Payment()
    {
        return $this->belongsTo(Timeshipping::class, 'id_pembayaran');
    }

}


