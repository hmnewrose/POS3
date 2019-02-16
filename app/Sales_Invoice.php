<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales_Invoice extends Model
{
    //
    protected $table = 'sales_invoices';
    protected $fillable=[
        'customer_id',
        'tax',
        'dis_value',
        'net_price',
        'Sales_date',

    ];

    public function customer(){

        return $this->belongsTo(Customer::class,'customer_id');
    }


    public function sales_invoice_details(){

        return $this->hasMany(sales_invoice_details::class,'sales_invoices_id','id');
    }
   
   
}
