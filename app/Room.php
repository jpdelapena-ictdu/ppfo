<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    public function inventory()
    {
        return $this->belongsTo('App\Inventory');
    }
}
