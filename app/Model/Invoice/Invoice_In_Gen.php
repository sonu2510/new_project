<?php

namespace App\Model\Invoice;

use Illuminate\Database\Eloquent\Model;

class Invoice_In_Gen extends Model
{
    protected $connection = 'mysql2';
    
    protected $table = 'in_gen_invoice_test';

    protected $primaryKey = 'in_gen_invoice_id';

     public function invoice_color()
    {
        return $this->hasOne('App\Models\Invoice\Invoice_Color','invoice_color_id','invoice_color_id');
    }

    public function invoice_product()
    {
        return $this->hasOne('App\Models\Invoice\Invoice_Product','invoice_product_id','invoice_product_id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice\Invoice','invoice_id','invoice_id');
    }
}
