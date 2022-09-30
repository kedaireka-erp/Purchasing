<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterGrade extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */		
    public function run()
    {
        $grade = New Grade;
        $grade->tipe = "NON WARRANTY";
        $grade->save();

        $grade = New Grade;
        $grade->tipe = "AAMA 2603";
        $grade->save();

        $grade = New Grade;
        $grade->tipe = "AAMA 2604";
        $grade->save();
    }
}
