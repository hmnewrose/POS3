<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SizesTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(CustomersTableSeeder::class);
        $this->call(DistiesTableSeeder::class);
        $this->call(OffersTableSeede::class);
        $this->call(OffersDetailsTableSeede::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(InvoiceDetailsTableSeeder::class);
       
    }
}
