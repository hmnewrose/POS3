<?php

namespace App;
use App\OfferDetails;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'name','category_id','size_id','color_id','qty','barcode','serial','price','other_costs','profit_percent','sell_price'
     ];
    //
    public function size(){
        return $this->belongsTo(Size::class , 'size_id');
    }

    public function color(){
        return $this->belongsTo(Color::class , 'color_id');
    }
    public function category(){
        return $this->belongsTo(Category::class , 'category_id');
    }

    // public function Sales_Invoice_detail()
    // {
    //     return $this->belongsTo(Sales_Invoice_details::class,'item_id');
    // }

    public function sales_invoice_details()
    {
        return $this->hasMany(Item::class,'item_id','id');
    }

    public function offerdetails()
    {
        return $this->hasMany('App\OfferDetails');
    }

   
}



