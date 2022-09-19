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
    protected $fillable=['no_pr','type','deadline_date','locations_id','ships_id', 'requester', 'prefixes_id', 'project', 'note', 'attachment','tanggal_diterima'];
    protected $dates=['delete_at'];

    public function toSearchableArray()
    {
        return[
            'no_pr'=>$this->no_pr,
            'type'=>$this->type,
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
        return $this->belongsToMany(Item::class, 'item_requests','id_request','id_item');
    }

    public function powder(){
        return $this->belongsToMany(powder::class, 'item_requests','id_request','powder_id');
    }

   

     


    public static function boot()
    {
        parent::boot();

        static::creating(function($purchase_requests){
            $purchase_requests->number = PurchaseRequest::where('prefixes_id', $purchase_requests->prefixes_id)->max('number')+1;
            $month = Carbon::now()->month;

            switch ($month) {
            case "01":
                $month = "I";

                break;
            case "02":
                $month = "II";
                break;
            case "03":
                $month = "III";

                break;
            case "04":
                    $month = "IV";
                
                    break;

            case "05":
                $month = "V";

                break;

            case "06":
                    $month = "VI";
                
                    break;

            case "07":
                    $month = "VII";

                    break;
            case "08":
                    $month = "VIII";
                
                    break;
            case "09":
                $month = "IX";

                break;
                case "10":
                    $month = "X";
                
                    break;
                case "11":
                    $month = "XI";
                
                    break;
                case "12":
                    $month = "XII";
                
                    break;
            default:
                echo "Terjadi kesalahan penulisan tanggal";
            }

            $purchase_requests->no_pr = str_pad($purchase_requests->number, 3, '0', STR_PAD_LEFT) . '/' . 'PR'.'/'.'AA'.'/'.'WS'.$purchase_requests->Prefixe->prefix  . '/'. $month . '/'. Carbon::now()->year;
        });
        static::updating(function ($purchase_requests) {
            // $purchase_requests->tanggal_diterima = PurchaseRequest::where('approval_status', 'pending')->update(array('approval_status' => 'approval')) ->update(array('tanggal_diterima' => format("Y-m-d")));
            
            $purchase_requests->number = PurchaseRequest::where('prefixes_id', $purchase_requests->prefixes_id)->max('number')+1;
            $month = Carbon::now()->month;

            switch ($month) {
                case "01":
                    $month = "I";
    
                    break;
                case "02":
                    $month = "II";
                    break;
                case "03":
                    $month = "III";
    
                    break;
                case "04":
                        $month = "IV";
                    
                        break;
    
                case "05":
                    $month = "V";
    
                    break;
    
                case "06":
                        $month = "VI";
                    
                        break;
    
                case "07":
                        $month = "VII";
    
                        break;
                case "08":
                        $month = "VIII";
                    
                        break;
                case "09":
                    $month = "IX";
    
                    break;
                    case "10":
                        $month = "X";
                    
                        break;
                    case "11":
                        $month = "XI";
                    
                        break;
                    case "12":
                        $month = "XII";
                    
                        break;
                default:
                    echo "Terjadi kesalahan penulisan tanggal";
                }

            $purchase_requests->no_pr = str_pad($purchase_requests->number, 3, '0', STR_PAD_LEFT).'/'.'PR'.'/'.'AA'.'/'.'WS'.$purchase_requests->Prefixe->prefix  . '/'. $month . '/'. Carbon::now()->year;
        });
    }

    
}