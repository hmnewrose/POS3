<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('items')->insert([
            'name' => 'item1cat1',
            'category_id' => '1',
            'size_id'=>'1',
            'color_id' =>'1',
            'barcode'=>'barcode1',
            'serial'=>'serial1',
            'price'=>'100',
            'other_costs'=>'50',
            'profit_percent'=>'10',
            'sell_price'=>'160',
           
        ]);

        DB::table('items')->insert([
            'name' => 'item2cat1',
            'category_id' => '1',
            'size_id'=>'1',
            'color_id' =>'1',
            'barcode'=>'barcode2',
            'serial'=>'serial2',
            'price'=>'50',
            'other_costs'=>'10',
            'profit_percent'=>'5',
            'sell_price'=>'65',
           
        ]);

        DB::table('items')->insert([
            'name' => 'item3cat1',
            'category_id' => '1',
            'size_id'=>'1',
            'color_id' =>'1',
            'barcode'=>'barcode2',
            'serial'=>'serial2',
            'price'=>'50',
            'other_costs'=>'10',
            'profit_percent'=>'5',
            'sell_price'=>'65',
           
        ]);


        DB::table('items')->insert([
            'name' => 'item4cat2',
            'category_id' => '2',
            'size_id'=>'3',
            'color_id' =>'3',
            'barcode'=>'barcode3',
            'serial'=>'serial3',
            'price'=>'55',
            'other_costs'=>'12',
            'profit_percent'=>'40',
            'sell_price'=>'150',
           
        ]);

        DB::table('items')->insert([
            'name' => 'item5cat2',
            'category_id' => '2',
            'size_id'=>'2',
            'color_id' =>'3',
            'barcode'=>'barcode4',
            'serial'=>'serial4',
            'price'=>'34',
            'other_costs'=>'23',
            'profit_percent'=>'15',
            'sell_price'=>'180',
           
        ]);

        DB::table('items')->insert([
            'name' => 'item6cat3',
            'category_id' => '3',
            'size_id'=>'3',
            'color_id' =>'4',
            'barcode'=>'barcode5',
            'serial'=>'serial5',
            'price'=>'90',
            'other_costs'=>'30',
            'profit_percent'=>'50',
            'sell_price'=>'280',
           
        ]);

        DB::table('items')->insert([
            'name' => 'item7cat3',
            'category_id' => '3',
            'size_id'=>'3',
            'color_id' =>'4',
            'barcode'=>'barcode5',
            'serial'=>'serial5',
            'price'=>'90',
            'other_costs'=>'30',
            'profit_percent'=>'50',
            'sell_price'=>'280',
           
        ]);

        DB::table('items')->insert([
            'name' => 'item8cat4',
            'category_id' => '4',
            'size_id'=>'3',
            'color_id' =>'4',
            'barcode'=>'barcode5',
            'serial'=>'serial5',
            'price'=>'90',
            'other_costs'=>'30',
            'profit_percent'=>'50',
            'sell_price'=>'280',
           
        ]);

        DB::table('items')->insert([
            'name' => 'item9cat4',
            'category_id' => '4',
            'size_id'=>'3',
            'color_id' =>'4',
            'barcode'=>'barcode5',
            'serial'=>'serial5',
            'price'=>'90',
            'other_costs'=>'30',
            'profit_percent'=>'50',
            'sell_price'=>'280',
           
        ]);

        DB::table('items')->insert([
            'name' => 'item10cat4',
            'category_id' => '4',
            'size_id'=>'3',
            'color_id' =>'4',
            'barcode'=>'barcode5',
            'serial'=>'serial5',
            'price'=>'90',
            'other_costs'=>'30',
            'profit_percent'=>'50',
            'sell_price'=>'280',
           
        ]);
    }
}
