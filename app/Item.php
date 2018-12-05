<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function inventory(){
    	return $this->belongsTo('App\Inventory');
    }
}
