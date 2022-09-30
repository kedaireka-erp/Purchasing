<?php

namespace Database\Seeders;

use App\Models\ships;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterShip extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ship = New ships;
        $ship->tipe = "Reguler (Sesuai Standar Supplier)";
        $ship->save();

        $ship = New ships;
        $ship->tipe = "Urgent";
        $ship->save();
    }
}
