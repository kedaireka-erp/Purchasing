<?php

namespace Database\Seeders;

use App\Models\Prefix;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterPrefix extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefix = New Prefix;
        $prefix->prefix = 'SLS';
        $prefix->divisi = 'Sales';
        $prefix->save();

        $prefix = New Prefix;
        $prefix->prefix = 'MLM';
        $prefix->divisi = 'Marketing';
        $prefix->save();
    }
}
