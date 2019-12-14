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
                                    <table id="zero_config" class="table table-striped table-bordered zero_config">
                                       <thead>
                                            <tr class="border-0">
                                                <th class="border-0"></th>
                                                <th class="border-0">Invoice Number</th>
                                                <th class="border-0">Mode Of shipement</th>
                                                <th class="border-0">Courier</th>
                                                <th class="border-0">Final Destinations</th>                                                
                                                <th class="border-0">Invoice List Upload</th>                                                
                                                <th class="border-0">E-BRC Submission Status</th>                                                
                                                <th class="border-0">Bank Submission Clearence</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                         
                                        </tfoot>
                                    </table>


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

          
@section('footer_scripts')
<script type="text/javascript">

 
  $(function() {
     
        $dataTable = $('#zero_config').DataTable({
            processing: true,
            serverSide: true,     
            ajax: {
            url : 'invoice/datatable',
            type:'GET',
           
            
        }, 
        aoColumns: [  
            {data: 'invoice_id', name: 'invoice_id',orderable: false},
            {data: 'invoice', name: 'invoice'},
            {data: 'mode_of_shipment', name: 'mode_of_shipment'},
            {data: 'courier', name: 'courier'},
            {data: 'destination', name: 'destination'},
            {data: 'option', name: 'option'},
            {data: 'status1', name: 'status1'},
            {data: 'status2', name: 'status2'},
            ],
           
        });
});

</script>
@endsection
          