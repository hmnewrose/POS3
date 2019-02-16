<?php

use Illuminate\Database\Seeder;

class DistiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('disties')->insert([
            'name' => 'disty1',
            'contact_person' => 'ahmed',
            'jop' => 'sales manager',
            'type' => 'good',
            'phone' => '111111',
            'address' => 'Bacous',
            'email' => 'disty1@test.com',
           
        ]);

        DB::table('disties')->insert([
            'name' => 'disty2',
            'contact_person' => 'mahmoud',
            'jop' => 'sales manager2',
            'type' => 'bad',
            'phone' => '2222222',
            'address' => 'Ramel ',
            'email' => 'disty2@test.com',
           
        ]);

        DB::table('disties')->insert([
            'name' => 'disty3',
            'contact_person' => 'moahmed',
            'jop' => 'sales manager3',
            'type' => 'fair',
            'phone' => '333333',
            'address' => 'ElAbrahimya',
            'email' => 'disty3@test.com',
           
        ]);

        DB::table('disties')->insert([
            'name' => 'disty4',
            'contact_person' => 'yasser',
            'jop' => 'sales manager',
            'type' => 'bad',
            'phone' => 'Factoyra',
            'address' => 'disty4address',
            'email' => 'disty4@ytest.com',
           
        ]);

        DB::table('disties')->insert([
            'name' => 'disty5',
            'contact_person' => 'wael',
            'jop' => 'sales manager',
            'type' => 'good',
            'phone' => '5555555',
            'address' => 'disty5address',
            'email' => 'disty5@test.com',
           
        ]);

        DB::table('disties')->insert([
            'name' => 'disty6',
            'contact_person' => 'galal',
            'jop' => 'sales manager',
            'type' => 'good',
            'phone' => '66666666',
            'address' => 'disty6address',
            'email' => 'disty6@test.com',
           
        ]);

        DB::table('disties')->insert([
            'name' => 'disty7',
            'contact_person' => 'moustafa',
            'jop' => 'sales manager',
            'type' => 'good',
            'phone' => '7777',
            'address' => 'disty7address',
            'email' => 'disty7@test.com',
           
        ]);

        DB::table('disties')->insert([
            'name' => 'disty8',
            'contact_person' => 'fouad',
            'jop' => 'sales manager',
            'type' => 'good',
            'phone' => '8888888',
            'address' => 'disty8address',
            'email' => 'disty8@test.com',
           
        ]);
    }
}
