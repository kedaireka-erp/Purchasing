<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Powder extends Model
{
    use HasFactory;
    protected $table = 'powders';
    protected $primarykey = 'id';
    protected $fillable = [
        'deadline_date',
        'requester',
        'project',
        'id_grade',
        'id_supplier',
        'note',
        'attachment',
        'status',
        'warna',
        'kode_warna',
        'finish',
        'quantity',
        'm2',
        'estimasi',
        'fresh',
        'recycle',
        'alokasi'
    ];

    public function grade(){
        return $this->belongsTo(Grade::class, 'id_grade');
    }
    
    public function supplier(){
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
}

