<?php

namespace App\Model\Invoice;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $connection = 'mysql2';

     protected $table = 'invoice_test';

     protected $primaryKey = 'invoice_id';

     public function country_list()
    {
    	//dd($this->hasOne('App\Model\Invoice\Country','country_id','country_destination'));
        return $this->hasOne('App\Model\Invoice\Country','country_id','country_destination');
    }
     public function courier_list()
    {
    	
        return $this->hasOne('App\Model\Invoice\courier','courier_id','courier_id');
    } 
    public function scan_data()
    {
        
        return $this->hasMany('App\Model\Invoice\invoice_scanned_file','invoice_id','invoice_id');
    }
}
