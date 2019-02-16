<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class OfferDetails extends Model
{
    //
    protected $table = 'offer_details';
    protected $fillable=[
        'offer_header_id',
        'item_id',
        'dis_item_value',
       ];

       public function offer_header()
    {
        return $this->belongsTo(OfferHeader::class,'offer_header_id');
    }


    public function item(){
        //return $this->belongsTo(Item::class,'item_id')->WithDefault();
        return $this->belongsTo(Item::class,'item_id','id')->WithDefault();
    }
    
    


}



