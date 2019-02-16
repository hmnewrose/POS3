<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{
    //
    protected $fillable = [
        'user_id', 'phone_type', 'phone_no','isprimary'
    ];

        public function User()
        {
            return $this->belongsTo(User::class,'user_id');
        }
    
}



