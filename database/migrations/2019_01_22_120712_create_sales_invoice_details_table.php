<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales_invoices_id')->default(3);
            $table->integer('item_id');
            $table->integer('offer_id')->nullable();
            $table->decimal('offer_discount',8,2)->default(0);
            $table->integer('qty')->default(1);
            $table->decimal('other_discount',8,2)->default(0);
            $table->decimal('itemnetprice',8,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_invoice_details');
    }
}
