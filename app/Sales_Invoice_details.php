<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Sales_Invoice;


class Sales_Invoice_details extends Model
{
    //
    protected $table = 'sales_invoice_details';
    protected $fillable=[
        'sales_invoices_id',
        'item_id',
        'offer_id',
        'offer_discount',
        'qty',
        'other_discount',
        'itemnetprice',

    ];

    // public function items(){

    //     return $this->hasMany(Item::class,'item_id');
    // }

    public function sales_invoice(){

        return $this->belongsTo(Sales_Invoice::class,'sales_invoices_id','id');
    }



    // public function items()
    // {
    //     return $this->hasMany(Item::class,'item_id','id');
    // }

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }

}
