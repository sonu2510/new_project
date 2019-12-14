<?php

namespace App\Model\Invoice;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sacanned_copy_upload extends Model
{
    //
     protected $connection = 'mysql';

     protected $dates = ['deleted_at'];

     protected $table = 'invoice_scanned_copy';

     protected $primaryKey = 'invoice_scanned_copy_id';

     public function invoice_id()
    {
    	//dd($this->hasOne('App\Model\Invoice\Country','country_id','country_destination'));
        return $this->hasOne('App\Model\Invoice\Invoice','invoice_id','invoice_id');
    }
}
