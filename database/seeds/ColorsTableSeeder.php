<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('colors')->insert([
            'color_name' => 'Red',
            
        ]);

        DB::table('colors')->insert([
            'color_name' => 'Blue',
            
        ]);

        DB::table('colors')->insert([
            'color_name' => 'Black',
            
        ]);

        DB::table('colors')->insert([
            'color_name' => 'White',
            
        ]);

        DB::table('colors')->insert([
            'color_name' => 'Green',
            
        ]);

    }
}
