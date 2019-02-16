<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    protected $fillable = [
       'name', 'phone', 'address','email'
    ];

    public function sales_invoices(){
        return $this->hasMany(Sales_Invoice::class , 'customer_id');
    }
    
    

    
}
