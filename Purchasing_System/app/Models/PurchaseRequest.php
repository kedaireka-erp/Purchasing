<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class PurchaseRequest extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    protected $guarded=['id'];
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


    public function Ship(){
        return $this->belongsTo(ships::class, "ships_id");
    }
    
    public function Location(){
        return $this->belongsTo(location::class, "locations_id");
    }

    public function Prefixe(){
        return $this->belongsTo(Prefix::class, "prefixes_id");
    }
}
