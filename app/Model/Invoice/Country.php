<?php

namespace App\Model\Invoice;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $connection = 'mysql2';
    
     protected $table = 'country';

     protected $primaryKey = 'country_id';

    public function currency()
    {
        return $this->hasOne('App\Model\Invoice\Currency','currency_id','currency_id');
    }
}
