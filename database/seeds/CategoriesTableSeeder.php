<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'name' => 'Category1',

        ]);

        DB::table('categories')->insert([
            'name' => 'Category2',

        ]);

        DB::table('categories')->insert([
            'name' => 'Category3',

        ]);

        DB::table('categories')->insert([
            'name' => 'Category4',

        ]);

        DB::table('categories')->insert([
            'name' => 'Category5',

        ]);
        DB::table('categories')->insert([
            'name' => 'Category6',

        ]);
    }
}
