<?php

namespace App\Model\Invoice;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $connection = 'mysql2';
    
     protected $table = 'currency';

     protected $primaryKey = 'currency_id';
}
