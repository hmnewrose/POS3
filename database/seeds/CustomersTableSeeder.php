<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->insert([
            'name' => 'General Customer',
            'phone' => '000000000',
            'address' => 'address general customer',
            'email' => 'generalcustomer@test.com',
        ]);

        DB::table('customers')->insert([
            'name' => 'customer1',
            'phone' => '1111111111',
            'address' => 'address customer1',
            'email' => 'customer1@test.com',
        ]);

        DB::table('customers')->insert([
            'name' => 'customer2',
            'phone' => '222222222',
            'address' => 'address customer2',
            'email' => 'customer2@test.com',
        ]);

        DB::table('customers')->insert([
            'name' => 'customer3',
            'phone' => '333333333333',
            'address' => 'address customer3',
            'email' => 'customer3@test.com',
        ]);

        DB::table('customers')->insert([
            'name' => 'customer4',
            'phone' => '44444444444',
            'address' => 'address customer4',
            'email' => 'customer4@test.com',
        ]);

        DB::table('customers')->insert([
            'name' => 'customer5',
            'phone' => '5555555555',
            'address' => 'address customer5',
            'email' => 'customer5@test.com',
        ]);
        DB::table('customers')->insert([
            'name' => 'customer6',
            'phone' => '666666666',
            'address' => 'address customer6',
            'email' => 'customer6@test.com',
        ]);
    }
}


