@extends('admin.layouts.admin_template')

@section('content')
<!-- Datatable -->
<!-- <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script> -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <a class="btn btn-primary mb-2" href="{{ route('download_products') }}">Download All Products</a>
      <div class="row">
          <div class="box">
            <div class="box-body">
          <table id="product_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                     <tbody>  
                          @foreach($data['all_records'] as $row)    
                         <tr>            
                         	<td>
                            <!-- {{ $row-> product_row_id }} -->
                            {{ $row->product_name }}

                        	</td>
                            
                            <td>
                              <button onclick="window.location='{{ url('/')}}/admin/product/{{$row->product_row_id}}/edit'" class="btn btn-warning mb-2">Edit</button>
                              
                              <form id="deleteProduct_{{$row->product_row_id}}" action="{{ url('/')}}/admin/product/{{$row->product_row_id}}" style="display: inline;" method="POST">
                                {{ method_field('DELETE') }}
                        @csrf 
                                <input class="btn btn-danger deleteLink" product_name="{{ $row->product_name }}" product_row_id="{{$row->product_row_id}}" data-toggle="modal" data-target="#modal-danger" deleteID="{{$row->product_row_id}}" value="Delete" style="width: 100px;">
                              </form>

                            </td>                        
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
      </div>
  </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
	      
          
  	</div>
	</section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal modal-danger fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Product</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <b class="catname"></b> product?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-outline submitDeleteModal">Submit</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
  $(document).ready(function() {
      $('#product_table').DataTable({
      	"order": [],
      });

      $('.deleteLink').click(function(){
      	var product_name = $(this).attr('product_name');
      	var product_row_id = $(this).attr('product_row_id');

      	$('#modal-danger .catname').empty();
      	$('#modal-danger .catname').append(product_name);
      	$('#modal-danger .submitDeleteModal').attr('product_row_id', product_row_id)
      });

      $('.submitDeleteModal').click(function(){
      	var product_row_id = $(this).attr('product_row_id');
      	$('#deleteProduct_'+product_row_id).submit();
      });
  });
</script>
@endsection