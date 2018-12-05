<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function building(){
    	return $this->hasMany('App\Building');
    }

    public function room(){
    	return $this->hasMany('App\Room');
    }

    public function item(){
    	return $this->hasMany('App\Item');
    }
}
