<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Timeshipping;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Po_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment = new Payment;
        $payment->name_payment = 'CBD';
        $payment->save();

        $payment = new Payment;
        $payment->name_payment = 'COD';
        $payment->save();

        $timeshipping = new Timeshipping;
        $timeshipping->name_time ='Segera';
        $timeshipping->save();

    }
}
