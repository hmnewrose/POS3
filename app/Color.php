<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    protected $fillable = [
        'color_name'
    ];


  public function items(){
        return $this->hasMany(Item::class , 'color_id');
    }

}
