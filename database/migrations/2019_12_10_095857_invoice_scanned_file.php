<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InvoiceScannedFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
          Schema::create('invoice_scanned_copy', function (Blueprint $table) {
            $table->increments('invoice_scanned_copy_id');
            $table->string('filename');
            $table->Integer('invoice_id');
            $table->Integer('status');          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
         Schema::dropIfExists('invoice_scanned_copy');
    }
}
