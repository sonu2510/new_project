<?php

namespace App\Model\Invoice;

use Illuminate\Database\Eloquent\Model;

class Invoice_Product extends Model
{
    //
    protected $connection = 'mysql2';
    
     protected $table = 'invoice_product_test';

     protected $primaryKey = 'invoice_product_id';

    public function invoice_product()
    {
        return $this->hasOne('App\Models\Invoice\Invoice','invoice_id','invoice_id');
    }
}
