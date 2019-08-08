<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedVehicle extends Model
{
    protected $table = 'BookedVehicle';

    public function vehicle()
    {
        return $this->hasOne('App\AvailableVehicle','productid', 'Productid');
    }
}
