<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    use HasFactory;

    protected $table = 'item_requests';
    protected $primaryKey = 'id';
    protected $fillable = ['id_request, id_item, no_po, supplier ,nama_supplier, id_waktu, id_pembayaran, alamat_penagihan, 
    lain-lain, note, signature, nama'];
    
    public function purchase()
    {
        return $this->belongsToMany(PurchaseRequest::class, 'item_requests','id_request','id_item');
    }
    public function item(){
        return $this->belongsToMany(Item::class, 'item_requests','id_request','id_item');
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


