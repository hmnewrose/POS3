<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disty extends Model
{
    //
    protected $fillable = [
        'name', 'contact_person', 'jop','type','phone','address','email'
     ];
}
