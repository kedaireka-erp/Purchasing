<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterSatuan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan = New Satuan;
        $satuan->name = "Potong";
        $satuan->unit = "Pcs";
        $satuan->save();

        $satuan = New Satuan;
        $satuan->name = "buah";
        $satuan->unit = "buah";
        $satuan->save();
    }
}
