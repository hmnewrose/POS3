<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sales_invoices')->insert([
            'customer_id' => '1',
            'tax' => '13',
            'dis_value'=> '20.00',
            'net_price'=> '1200',
            'Sales_date'=> '2018-1-11 00:10:05',
                   
        ]);

        DB::table('sales_invoices')->insert([
            'customer_id' => '1',
            'tax' => '13',
            'dis_value'=> '00.00',
            'net_price'=> '2500',
            'Sales_date'=> '2018-5-21 08:40:05',
                   
        ]);

        DB::table('sales_invoices')->insert([
            'customer_id' => '1',
            'tax' => '0',
            'dis_value'=> '00.00',
            'net_price'=> '500',
            'Sales_date'=> '2018-12-21 09:00:34',
                   
        ]);

        DB::table('sales_invoices')->insert([
            'customer_id' => '2',
            'tax' => '14',
            'dis_value'=> '100.00',
            'net_price'=> '1000',
            'Sales_date'=> '2019-01-11 11:24:05',
                   
        ]);

        DB::table('sales_invoices')->insert([
            'customer_id' => '2',
            'tax' => '14',
            'dis_value'=> '150.00',
            'net_price'=> '3000',
            'Sales_date'=> '2019-01-12 13:40:05',
                   
        ]);

        DB::table('sales_invoices')->insert([
            'customer_id' => '3',
            'tax' => '14',
            'dis_value'=> '0.00',
            'net_price'=> '4000',
            'Sales_date'=> '2019-01-12 13:40:05',
                   
        ]);

        DB::table('sales_invoices')->insert([
            'customer_id' => '3',
            'tax' => '14',
            'dis_value'=> '200.00',
            'net_price'=> '5000',
            'Sales_date'=> '2019-01-12 13:40:05',
                   
        ]);


    }
}
