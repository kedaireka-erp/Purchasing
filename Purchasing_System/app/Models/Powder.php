<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class powder extends Model
{
    use HasFactory;
    protected $table = 'powders';
    protected $primarykey = 'id';
    protected $fillable = ['warna','color_id','finish', 'finishing', 'quantity','m2','estimasi','fresh','recycle','grades_id','suppliers_id','alokasi'];

    public function grade(){
        return $this->belongsTo(Grade::class, 'grades_id');
    }
    
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function purchase(){
        return $this->belongsToMany(PurchaseRequest::class, 'item_requests','id_request', 'powder_id');
    }

  
}
