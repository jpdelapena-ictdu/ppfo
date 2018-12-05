<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    public function personnel(){
    	return $this->hasMany('App\Personnel');
    }

    public function room(){
    	return $this->hasMany('App\Room');
    }

    public function inventory(){
    	return $this->belongsTo('App\Inventory');
    }
}
