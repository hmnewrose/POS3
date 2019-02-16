<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sales_invoice_details')->insert([
            'sales_invoices_id' => '1',
            'item_id' => '1',
            'offer_id'=> '1',
            'offer_discount'=> '5',
            'qty' => '1',
            'other_discount'=> '3',
            'itemnetprice' => '152',
        ]);

        DB::table('sales_invoice_details')->insert([
            'sales_invoices_id' => '1',
            'item_id' => '1',
            'offer_id'=> '1',
            'offer_discount'=> '5',
            'qty' => '1',
            'other_discount'=> '5',
            'itemnetprice' => '150',
        ]);

        DB::table('sales_invoice_details')->insert([
            'sales_invoices_id' => '1',
            'item_id' => '2',
            'offer_id'=> '1',
            'offer_discount'=> '5',
            'qty' => '2',
            'other_discount'=> '10',
            'itemnetprice' => '100',
        ]);

        DB::table('sales_invoice_details')->insert([
            'sales_invoices_id' => '1',
            'item_id' => '3',
            'offer_id'=> '3',
            'offer_discount'=> '12',
            'qty' => '3',
            'other_discount'=> '10',
            'itemnetprice' => '173',
        ]);

        DB::table('sales_invoice_details')->insert([
            'sales_invoices_id' => '2',
            'item_id' => '4',
            //'offer_id'=> '1',
           // 'offer_discount'=> '0',
            'qty' => '1',
            'other_discount'=> '0',
            'itemnetprice' => '150',
        ]);

    }
}
