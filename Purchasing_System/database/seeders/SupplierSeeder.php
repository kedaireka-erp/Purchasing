<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new Supplier;
        $supplier->vendor = 'AXALTA';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->vendor = 'JOTUN';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->vendor = 'YINDA';
        $supplier->save();

        $supplier = new Supplier;
        $supplier->vendor = 'AKZO';
        $supplier->save();
    }
}
