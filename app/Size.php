<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Size;

class Size extends Model
{
    //
   

    protected $fillable = [
        'size_name'
    ];
    
    public function items(){
        return $this->hasMany(Item::class , 'size_id');
    }

    
}



