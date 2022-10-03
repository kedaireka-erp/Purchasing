<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class powder extends Model
{
    use HasFactory;
    protected $table = 'powders';
    protected $primarykey = 'id';
    protected $fillable = ['tanggal_kedatangan_barang','outstanding','sudah_datang','warna','color_id','finish', 'finishing', 'quantity','m2','estimasi','fresh','recycle','grades_id','suppliers_id','alokasi'];

    public function grade(){
        return $this->belongsTo(Grade::class, 'grades_id');
    }
    
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function colour(){
        return $this->belongsTo(Colour::class, 'color_id');
    }

    public function purchase(){
        return $this->belongsToMany(PurchaseRequest::class, 'item_requests','id_request', 'powder_id');
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function($powder){
            $powder->outstanding = $powder->quantity - $powder->sudah_datang;
        });
        static::updating(function ($powder) {
            $powder->outstanding = $powder->outstanding - $powder->sudah_datang;
            $powder->sudah_datang = $powder->quantity-$powder->outstanding;

        });
        
    }
  
}
