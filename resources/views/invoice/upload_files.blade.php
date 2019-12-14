@extends('common.default')

@section('header')
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Upload </h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="/invoice">Invoice List </a></li>
                                      <li class="breadcrumb-item active" aria-current="page">Details</li>
                                </ol>   
                                 
                            </nav>
                        </div>
                    </div>
                </div>
  <style type="text/css">
    .dropzone {
    background: white;
    border-radius: 5px;
    border: 2px dashed rgb(0, 135, 247);
    border-image: none;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}
</style>
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
                                <h5 class="card-title">Invoice Document Upload</h5>
                                <div class="table-responsive">
                                  <form method="post" action="{{url('image/upload/store')}}" enctype="multipart/form-data" 
                                                      class="dropzone" id="dropzone">
                                      <input type="hidden" name="invoice_id" id="invoice_id" value="{{$invoice_id}}">
                                      <input type="hidden" name="status" id="status" value="{{$status}}">
                                        {{ csrf_field() }}
                                    </form>   
          


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

 
   Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function (file) {
                    var name = file.upload.filename;
                    var invoice_id =$('#invoice_id').val();
                 
                        deleteImage(invoice_id,name);
                      
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function (file, response) {

                    //console.log(file);
                   // console.log('response===========================');
                    console.log(response);
                },
                error: function (file, response) {
                   
                       //     console.log('error&&&&&&&&&&&&&&&&&&&&&&');
                    console.log(response);
                    return false;
                }
            };

function deleteImage(invoice_id,filename){  
      $.ajax({
                type: 'get',
                url: '{{ url("image/delete") }}',
                data: {filename: filename,invoice_id:invoice_id},
                
                success: function (data) {
                    console.log("File has been successfully removed!!");
                },
                error: function (e) {
                    console.log(e);
                }
              });
}
</script>
@endsection
          