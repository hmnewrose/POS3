<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferHeader extends Model
{
    //
    protected $table = 'offer_headers';
    protected $fillable=[
        'name',
        'offername',
        'start_date',
        'expire_date',

    ];

    public function offerdetails()
    {
        return $this->hasMany(OfferDetails::class,'offer_header_id');
    }

    public function invoices(){

        return $this->hasMany(Sales_Invoice_details::class,'offer_id');
    }

    



}
