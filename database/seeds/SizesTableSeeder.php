<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sizes')->insert([
            'size_name' => 'Large',
            
        ]);

        DB::table('sizes')->insert([
            'size_name' => 'X Large',
            
        ]);

        DB::table('sizes')->insert([
            'size_name' => '2X Large',
            
        ]);

        DB::table('sizes')->insert([
            'size_name' => '3X Large',
            
        ]);

        DB::table('sizes')->insert([
            'size_name' => 'Small',
            
        ]);
        
        DB::table('sizes')->insert([
            'size_name' => 'Medium',
            
        ]);

    }
}
