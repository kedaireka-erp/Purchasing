<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Carbon\Carbon;

class PurchaseRequest extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $table = 'purchase_requests';
    protected $primaryKey = 'id';
    protected $fillable=['no_pr', 'deadline_date','locations_id','ships_id', 'requester', 'prefixes_id', 'project', 'note', 'attachment'];
    protected $dates=['delete_at'];

    public function toSearchableArray()
    {
        return[
            'no_pr'=>$this->no_pr,
            'deadline_date'=>$this->deadline_date,
            'locations_id'=>$this->locations_id,
            'ships_id'=>$this->ships_id,
            'requester'=>$this->requester,
            'prefixes_id'=>$this->prefixes_id,
            'project'=>$this->project,
            'attachment'=>$this->attachment,
        ];
    }

    //Tiap satu PR itu memuat satu metode pengiriman
    public function Ship(){
        return $this->belongsTo(ships::class, "ships_id");
    }

    //Tiap datu PR itu memuat satu tempat tujuan
    public function Location(){
        return $this->belongsTo(location::class, "locations_id");
    }

    //tiap satu PR memiliki 1 divisi
    public function Prefixe(){
        return $this->belongsTo(Prefix::class, "prefixes_id");
    }

    //satu PR dapat dimiliki beberapa itam
    public function item(){
        return $this->belongsToMany(Item::class);
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function($purchase_requests){
            $purchase_requests->number = PurchaseRequest::where('prefixes_id', $purchase_requests->prefixes_id)->max('number')+1;
            $purchase_requests->no_pr = 'PR'. '/'. $purchase_requests->Prefixe->prefix  . '/' .str_pad($purchase_requests->number, 5, '0', STR_PAD_LEFT) . '/'. Carbon::now()->month . '/'. Carbon::now()->year;
        });
        static::updating(function ($invoice) {
            $purchase_requests->number = PurchaseRequest::where('prefixes_id', $purchase_requests->prefixes_id)->max('number')+1;
            $purchase_requests->no_pr = 'PR'. '/'. $purchase_requests->Prefixe->prefix  . '/' .str_pad($purchase_requests->number, 5, '0', STR_PAD_LEFT) . '/'. Carbon::now()->month . '/'. Carbon::now()->year;
        });
    }
}