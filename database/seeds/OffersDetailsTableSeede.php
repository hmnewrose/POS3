<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class OffersDetailsTableSeede extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('offer_details')->insert([
            'offer_header_id' => '1',
            'item_id' => '1',
            'dis_item_value' => '5',
                     
           
        ]);

        DB::table('offer_details')->insert([
            'offer_header_id' => '1',
            'item_id' => '2',
            'dis_item_value' => '5',
                 
           
        ]);

        DB::table('offer_details')->insert([
            'offer_header_id' => '1',
            'item_id' => '3',
            'dis_item_value' => '10',
                 
           
        ]);

        DB::table('offer_details')->insert([
            'offer_header_id' => '1',
            'item_id' => '4',
            'dis_item_value' => '15',
                 
           
        ]);

        DB::table('offer_details')->insert([
            'offer_header_id' => '2',
            'item_id' => '1',
            'dis_item_value' => '12',
           ]);

           
        DB::table('offer_details')->insert([
            'offer_header_id' => '2',
            'item_id' => '2',
            'dis_item_value' => '13',
           ]);

           
        DB::table('offer_details')->insert([
            'offer_header_id' => '2',
            'item_id' => '3',
            'dis_item_value' => '5',          
        ]);

           DB::table('offer_details')->insert([
            'offer_header_id' => '3',
            'item_id' => '1',
            'dis_item_value' => '5',           
            ]);

           DB::table('offer_details')->insert([
            'offer_header_id' => '3',
            'item_id' => '3',
            'dis_item_value' => '12',        
        ]);
    }
}
