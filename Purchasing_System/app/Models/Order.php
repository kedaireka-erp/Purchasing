<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PurchaseRequest;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'no_po', 'supplier' ,'id_supplier', 'id_waktu', 'id_alamat_kirim', 'id_pembayaran', 'alamat_penagihan', 
        'lain_lain', 'note', 'signature','nama'
    ];

    public function item(){
        return $this->belongsToMany(Item::class, 'item_requests','id_item','order_id');
    }
    public function purchases(){
        return $this->belongsToMany(PurchaseRequest::class, 'item_requests','id_request','order_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class,'id_pembayaran');
    }
    public function timeshipping()
    {
        return $this->belongsTo(Timeshipping::class,'id_waktu');
    }
    public function location()
    {
        return $this->belongsTo(location::class,'id_alamat_kirim');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier', 'id');
    }

    
    public static function boot()
    {
        parent::boot();

        static::creating(function($order){
            $order->number = Order::max('number')+1;
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

            $order->no_po = str_pad($order->number, 3, '0', STR_PAD_LEFT) . '/' . 'PO'.'/'.'AA'.'/'.'WS'. '/'. $month . '/'. Carbon::now()->year;
        });
        // static::updating(function ($purchase_requests) {
        //     // $purchase_requests->tanggal_diterima = PurchaseRequest::where('approval_status', 'pending')->update(array('approval_status' => 'approval')) ->update(array('tanggal_diterima' => format("Y-m-d")));
            
        //     $purchase_requests->number = PurchaseRequest::where('prefixes_id', $purchase_requests->prefixes_id)->max('number')+1;
        //     $month = Carbon::now()->month;

        //     switch ($month) {
        //         case "01":
        //             $month = "I";
    
        //             break;
        //         case "02":
        //             $month = "II";
        //             break;
        //         case "03":
        //             $month = "III";
    
        //             break;
        //         case "04":
        //                 $month = "IV";
                    
        //                 break;
    
        //         case "05":
        //             $month = "V";
    
        //             break;
    
        //         case "06":
        //                 $month = "VI";
                    
        //                 break;
    
        //         case "07":
        //                 $month = "VII";
    
        //                 break;
        //         case "08":
        //                 $month = "VIII";
                    
        //                 break;
        //         case "09":
        //             $month = "IX";
    
        //             break;
        //             case "10":
        //                 $month = "X";
                    
        //                 break;
        //             case "11":
        //                 $month = "XI";
                    
        //                 break;
        //             case "12":
        //                 $month = "XII";
                    
        //                 break;
        //         default:
        //             echo "Terjadi kesalahan penulisan tanggal";
        //         }

        //     $purchase_requests->no_po = str_pad($purchase_requests->number, 3, '0', STR_PAD_LEFT).'/'.'PO'.'/'.'AA'.'/'.'WS'.$purchase_requests->Prefixe->prefix  . '/'. $month . '/'. Carbon::now()->year;
        // });
    }

}
