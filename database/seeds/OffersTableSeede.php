<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OffersTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        DB::table('offer_headers')->insert([
            'offername' => 'offer1',
            'start_date' => '2019-01-21 14:40:05',
            'expire_date'=>'2019-01-31 14:40:05',
           
           
        ]);

        DB::table('offer_headers')->insert([
            'offername' => 'offer2',
            'start_date' => '2019-3-1 14:40:05',
            'expire_date'=>'2019-5-31 00:00:00',
           
           
        ]);

        DB::table('offer_headers')->insert([
            'offername' => 'offer3',
            'start_date' => '2018-5-21 14:40:05',
            'expire_date'=>'2018-8-21 0:0:0',
           
           
        ]);

        DB::table('offer_headers')->insert([
            'offername' => 'offer4',
            'start_date' => '2019-3-1 00:00:00',
            'expire_date'=>'2019-5-31 0:0:0',
           
           
        ]);
    }
}
