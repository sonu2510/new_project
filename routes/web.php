<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();


Route::get('/invoice', 'invoice\invoice_controller@index')->name('invoice');


Route::get('/uploaded_invoice_ebrc_submission', 'invoice\invoice_controller@index')->name('invoice_ebrc');
Route::get('/uploaded_invoice', 'invoice\invoice_controller@index')->name('invoice_document');
Route::get('/uploaded_invoice_bank_submission', 'invoice\invoice_controller@index')->name('invoice_bank');




Route::get('/invoice/datatable','invoice\invoice_controller@datatable_invoice')->name('invoice.datatable');
Route::get('/home', 'HomeController@index')->name('home');



Route::get('/invoice/upload_file/{invoice_id}', 'invoice\invoice_controller@invoice_view')->name('invoice.upload');
Route::get('/invoice/upload_file_ebrc/{invoice_id}', 'invoice\invoice_controller@upload_view_ebrc')->name('inv_upload.ebrc');
Route::get('/invoice/upload_file_bank/{invoice_id}', 'invoice\invoice_controller@upload_view_bank')->name('inv_upload.bank');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('image/upload','invoice\invoice_controller@fileCreate');
Route::post('image/upload/store','invoice\invoice_controller@fileStore');
Route::get('image/delete','invoice\invoice_controller@fileDestroy');