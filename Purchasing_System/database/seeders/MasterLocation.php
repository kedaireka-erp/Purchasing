<?php

namespace Database\Seeders;

use App\Models\location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterLocation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = new location;
        $location->location_name = "Head Office";
        $location->address = "Artha Gading Niaga B17, RT.18/RW.8, Klp. Gading Bar., Kec. Klp. Gading, Jakarta, Daerah Khusus Ibukota Jakarta 14240";
        $location->save();

        $location = new location;
        $location->location_name = "Warehouse";
        $location->address = "Kp. Jarakosta RT.003 RW.002 Sukadanau, Cikarang Barat, Kab. Bekasi, Jawa Barat 17530";
        $location->save();
    }
    
}
