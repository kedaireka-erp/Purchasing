<?php

namespace Database\Seeders;

use App\Models\Master_Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterItem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $masteritem = New Master_Item;
        $masteritem->item_name = "Kamera DSLR";
        $masteritem->save();

        $masteritem = New Master_Item;
        $masteritem->item_name = "ATK";
        $masteritem->save();
    }
}
