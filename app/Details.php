<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bank;

class Details extends Model
{
    protected $table='details';
    function BankDetails()
    {
        return $this->belongsTo('App\Bank','Bank_Id','id');
    }
}
