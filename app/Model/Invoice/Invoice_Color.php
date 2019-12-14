<?php

namespace App\Model\Invoice;

use Illuminate\Database\Eloquent\Model;

class Invoice_Color extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'invoice_color_test';

    protected $primaryKey = 'invoice_color_id';

    public function invoice_product()
    {
        return $this->hasOne('App\Model\Invoice\Invoice_Product','invoice_product_id','invoice_product_id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Model\Invoice\Invoice','invoice_id','invoice_id');
    }
}
