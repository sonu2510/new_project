@extends('common.default')

@section('header')
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Invoice</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">List</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
        
@endsection
  
@section('content')          
         
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
              
                    <div class="col-12">
                         <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Invoice List</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                       <thead>
                                            <tr class="border-0">
                                                <th class="border-0">Invoice Number</th>
                                                <th class="border-0">Mode Of shipement</th>
                                                <th class="border-0">Final Destinations</th>                                                
                                                <th class="border-0">Invoice List Upload</th>                                                
                                                <th class="border-0">E-BRC Submission Status</th>                                                
                                                <th class="border-0">Bank Submission Clearence</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           

                                            @foreach($invoice_data as $invoice_datas)
                                            <tr>

                                                <td>
                                                    <div class="d-flex no-block align-items-center">
                                                        <a class="badge badge-pill badge-info" href="javascript:void(0)">IN</a>
                                                        <div class="">
                                                            <h5 class="m-b-0 font-16 font-medium">{{$invoice_datas->invoice_no}}</h5><span>{{date('l, F d Y', strtotime($invoice_datas->invoice_date))}}</span></div>
                                                    </div>
                                                </td>
                                                <td>BY {{strtoupper(base64_decode($invoice_datas->transportation))}}</td>
                                                <td>
                                                    <div class="d-flex no-block align-items-center">                                                   
                                                            <h5 class="m-b-0 font-16 font-medium">{{$invoice_datas->country_list->country_name}}</h5></div>
                                                    </div>
                                                </td> 
                                                <td><button type="button" class="btn btn-outline-dark">Invoice</button><br><br><button type="button" class="btn btn-outline-success">Packing List</button><br><br><button type="button" class="btn btn-outline-success">Packing Detail List</button></td>
                                                <td><button type="button" class="btn btn-outline-danger">Pending</button></td>                                               
                                                <td><button type="button" class="btn btn-outline-danger">Pending</button></td>                                               
                                            </tr>
                                            @endforeach
                                           
                                        </tfoot>
                                    </table>
                             
                                  <div class="btn-group " role="group"  aria-label="Second group">
                                                  @if(PaginateRoute::hasPreviousPage())
                                                  
                                                    <a href="{{ PaginateRoute::previousPageUrl() }}" rel="prev"><button type="button" class="btn btn-secondary"><i class="fa fa-fast-backward"></i></button></a>
                                                 
                                                  @else
                                                    <a href="#" aria-label="Previous"><button type="button" class="btn btn-secondary"><i class="fa fa-fast-backward"></i></button>
                                                  </a>
                                                  @endif
                                                 
                                                  @for ($i = 1; $i <= count($invoice_data); $i++)                                                

                                                    <a href="{{ PaginateRoute::pageUrl($i) }}"><button type="button" class="btn btn-secondary">{{ $i }}</button></a>
                                                                                                  
                                                  @endfor
                                                  

                                                  @if(PaginateRoute::hasNextPage($invoice_data))
                                                  
                                                    <a href="{{ PaginateRoute::nextPageUrl($invoice_data) }}" rel="next"><button type="button" class="btn btn-secondary"><i class="fa fa-fast-forward"></i></button></a>
                                                  
                                                  @else 
                                                  <a href="#" aria-label="Next"><button type="button" class="btn btn-secondary"><i class="fa fa-fast-forward"></i></button>
                                                  </a>
                                                  @endif

                                              </div>

                            </div>
                            </div>
                        </div>
                  </div>
             </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
               
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
    
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
         
            
              
@endsection

          