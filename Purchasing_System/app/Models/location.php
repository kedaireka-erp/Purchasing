<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class location extends Model
{
    use HasFactory, Searchable;
  
    
    protected $table = 'locations';
    protected $primaryKey = 'id';
    protected $fillable = ['location_name','address']; 
    public function toSearchableArray()
    {
        return[
            'location_name'=>$this->location_name,
            'address'=>$this->address,
        ];
    }

    //Satu lokasi dapat dipakai untuk beberapa PR
    public function purchase_requests(){
        return $this->hasMany(PurchaseRequest::class, "locations_id", "id");
    }
    public function order(){
        return $this->hasMany(Order::class, "id_alamat_kirim", "id");
    }
}