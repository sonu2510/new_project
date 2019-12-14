<?php

namespace App\Http\Controllers\invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Invoice\Country;
use App\Model\Invoice\courier;
use App\Model\Invoice\Invoice;
use App\Model\Invoice\Invoice_Product;
use App\Model\Invoice\Invoice_Color;
use App\Model\Invoice\Invoice_In_Gen;
use App\Model\Invoice\invoice_scanned_file;
use DataTables;
use Validator;
use Alert;
use DB;
use Illuminate\Support\Facades\Route;

class invoice_controller extends Controller
{
    // 
     public function index()
    {
    	/*$invoice_data=invoice::with('country_list','courier_list')->where('is_delete',0)->orderBy('invoice_id','DESC')->simplePaginate(20);*/
        return view('invoice.index');
    }
   /*  public function GetFileDetails($invoice_id){
     
               $files_invoice=invoice_scanned_file::where('invoice_id',$invoice_id)->where('status', 0)->get();             
               $files_ebrc=invoice_scanned_file::where('invoice_id',$invoice_id)->where('status', 1)->get();
              $files_bank=invoice_scanned_file::where('invoice_id', $invoice_id)->where('status', 2)->get();
     }*/
    public function datatable_invoice(){

    	$invoice_scanned_file_id=invoice_scanned_file::select(DB::raw('group_concat(invoice_scanned_copy.invoice_id) as g_invoice_id'))->first();
    
        $invoice_data_count=invoice::with('country_list','courier_list')->where('is_delete',0)->where('done_status',1)->whereNotIn('invoice_id',(explode(',',$invoice_scanned_file_id->g_invoice_id)))->orderBy('invoice_id','DESC')->get(); 

   //   dd(count($invoice_data_count));
        $invoice_data=invoice::with('country_list','courier_list')->where('is_delete',0)->where('done_status',1)->whereNotIn('invoice_id',(explode(',',$invoice_scanned_file_id->g_invoice_id)))->orderBy('invoice_id','DESC')->limit(count($invoice_data_count)); 

      
     
     // $invoice_data=invoice_scanned_file::leftjoin('swissin_swissonline.invoice_test as dt2', 'invoice_scanned_copy.invoice_id','=','dt2.invoice_id')->get(); left joim query
  
      //  $query = DB::table('swissin_swissonline.invoice_test as dt1')->leftjoin('demo_project.invoice_scanned_copy as dt2', 'dt2.invoice_id', '=', 'dt1.invoice_id');        
    //    $output = $query->select(['dt1.*','dt2.*'])->get();







    	 return Datatables::of($invoice_data)     
            
    	 ->addColumn('invoice_id', function($invoice_data){
  
                         return  $invoice_data->invoice_id;      
                            
                    })
         ->addColumn('invoice', function($invoice_data){

             return  ' <div class="d-flex no-block align-items-center">
                                            <a class="badge badge-pill badge-info" href="javascript:void(0)">IN</a>
                                            <div class="">
                                                <h5 class="m-b-0 font-16 font-medium">'.$invoice_data->invoice_no.'</h5><span>'.date('l, F d Y', strtotime($invoice_data->invoice_date)).'</span></div>
                                        </div>';

                
        })
     			 ->addColumn('mode_of_shipment', function($invoice_data){
         
                        return 'BY '.strtoupper(base64_decode($invoice_data->transportation)).' ';
                    })
                      ->addColumn('courier', function($invoice_data){
   
                         return '<div class="d-flex no-block align-items-center">                                                   
                                   <h5 class="m-b-0 font-16 font-medium">'.@$invoice_data->courier_list->courier_name.'</h5></div>
                                 </div>';
                                  
                    })  
                      ->addColumn('destination', function($invoice_data){
   
                         return '<div class="d-flex no-block align-items-center">                                                   
                                   <h5 class="m-b-0 font-16 font-medium">'.@$invoice_data->country_list->country_name.'</h5></div>
                                 </div>';
                                  
                    })
                       ->addColumn('option', function($invoice_data){

                        $files_invoice=invoice_scanned_file::where('invoice_id',$invoice_data->invoice_id)->where('status', 0)->get();   
                        if(!empty($files_invoice)){
                           return  '<a href="'.Route('invoice.upload',$invoice_data->invoice_id).'"><button type="button" class="btn btn-outline-dark">Invoice</button><br><br><button type="button" class="btn btn-outline-danger">Packing List</button><br><br><button type="button" class="btn btn-outline-danger">Packing Detail List</button>	</a>';
                       
                            }else{
                                return '<button type="button" class="btn btn-outline-success">Done</button>';
                            }
                            
                    })

                    ->addColumn('status1', function($invoice_data){   
                        $files_ebrc=invoice_scanned_file::where('invoice_id', $invoice_data->invoice_id)->where('status', 1)->get();

                           if(!empty($files_ebrc)){
                             return '<a href="'.Route('inv_upload.ebrc',$invoice_data->invoice_id).'"><button type="button" class="btn btn-outline-danger">Pending</button></a>';
                       
                            }else{
                                return '<button type="button" class="btn btn-outline-success">Done</button>';
                            }

                     })

                     ->addColumn('status2', function($invoice_data){   
                         $files_bank=invoice_scanned_file::where('invoice_id',  $invoice_data->invoice_id)->where('status', 2)->get(); 

                          if(!empty($files_ebrc)){
                             return  '<a href="'.Route('inv_upload.bank',$invoice_data->invoice_id).'"><button type="button" class="btn btn-outline-danger">Pending</button></a>';
                       
                            }else{
                                return '<button type="button" class="btn btn-outline-success">Done</button>';
                            }



                    
                                
                    })

                 
                    ->rawColumns(['invoice_id,invoice,courier,destination,option,status1,status2'])
                    ->escapeColumns(['mode_of_shipment'])
                    ->make(true);
    }
    public function invoice_view($invoice_id){
    	$status=0;
    	   return view ('invoice.upload_files',compact('invoice_id','status'));
    }   
    public function upload_view_ebrc($invoice_id){
    	 	$status=1;
    	   return view ('invoice.upload_files',compact('invoice_id','status'));
    }   
    public function upload_view_bank($invoice_id){
    	 	$status=2;
    	   return view ('invoice.upload_files',compact('invoice_id','status'));
    }


    public function fileDestroy(Request $request){

    	$filename = $request->get('filename');
        $invoice_id = $request->get('invoice_id');
      
        $files=invoice_scanned_file::where('filename', $filename)->where('invoice_id', $invoice_id)->first();
       // dd($files->invoice_scanned_copy_id);
        $files_delete=invoice_scanned_file::destroy($files->invoice_scanned_copy_id);
               
       if($request->input('status')=='0'){
      		  $path = public_path('invoice_file/').$filename;
        }
        else  if($request->input('status')=='1'){
        	 $path = public_path('invoice_ebrc_file/').$filename;
        }  
        else  if($request->input('status')=='2'){
       		 $path = public_path('invoice_bank_files/').$filename;
        }
        $path = public_path('Export Invoice Files/').$filename;
      
        if (file_exists($path)) {
            unlink($path);          
        }       
       
        return $filename;
   

    }
    public function fileStore(Request $request){
    	

      $rules = array(
        'file'  => 'required|image|max:2048'
     );

     $error = Validator::make($request->all(), $rules);

     if($error->fails())
     {
      return response()->json(['errors' => $error->errors()->all()]);
     }

        $image = $request->file('file');

        $imageName = $image->getClientOriginalName();
      //  $imageName .= $request->input('invoice_id');

        if($request->input('status')=='0'){
       	 $image->move(public_path('invoice_file'), $imageName);
        }
        else  if($request->input('status')=='1'){
        	$image->move(public_path('invoice_ebrc_file'), $imageName);
        }  
        else  if($request->input('status')=='2'){
        	$image->move(public_path('invoice_bank_file'), $imageName);
        }


        $imageUpload = new invoice_scanned_file();
        $imageUpload->invoice_id = $request->input('invoice_id');;
        $imageUpload->status = $request->input('status');;
        $imageUpload->filename = $imageName;
        $imageUpload->save();
        return response()->json(['success' => 'done']);
    	
    }

    public function fileCreate(Request $request){
    	
    }
}
