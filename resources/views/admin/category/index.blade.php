@extends('admin.layouts.admin_template')

@section('content')
<!-- Datatable -->
<!-- <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script> -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Category Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
	        <div class="box">
	        	<div class="box-body">
					<table id="category_table" class="table table-bordered table-striped">
			              <thead>
			                  <tr>
			                    <th>Category Name</th>
			                    <th>Category Image</th>
			                    <th>Action</th>
			                  </tr>
			              </thead>
		                 <tbody>  
		                      @foreach($data['all_records'] as $row)    
		                     <tr>            
		                        <td> 
		                         @if($row->level == 0) <b>  @endif 
		                         @if($row->level == 1) &nbsp; - @endif   
		                         @if($row->level == 2) &nbsp; &nbsp; - - @endif     
		                         @if($row->level == 3) &nbsp; &nbsp; &nbsp; - - - @endif       
		                         @if($row->level == 4) &nbsp; &nbsp; &nbsp; &nbsp; - - - - @endif       
		                         @if($row->level == 5) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  - - - - - @endif       
		                         @if($row->level > 5)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - - - @endif
		                         
		                         {{ $row->category_name }} 
		                         @if($row->level == 0) </b>  @endif 
		                         </td> 
		                        <td align="center">
		                        	@if($row->category_image != null)
		                        	<img src="{{ asset('uploads/category/thumbnail').'/'.$row->category_image }}" alt="" width="80px" >
		                        	@else
		                        	<img src="{{ asset('uploads/category/no_category.png') }}" alt="" width="50px" height="50px">
		                        	@endif
		                        </td>
		                        <td>
		                          <button onclick="window.location='{{ url('/')}}/admin/category/{{$row->category_row_id}}/edit'" class="btn btn-warning mb-2">Edit</button>
		                          
		                          <form id="deleteCategory_{{$row->category_row_id}}" action="{{ url('/')}}/admin/category/{{$row->category_row_id}}" style="display: inline;" method="POST">
		                          	{{ method_field('DELETE') }}
            						@csrf	
		                          	<input class="btn btn-danger deleteLink" category_name="{{ $row->category_name }}" category_row_id="{{$row->category_row_id}}" data-toggle="modal" data-target="#category-delete-modal" deleteID="{{$row->category_row_id}}" value="Delete" style="width: 100px;">
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

<div class="modal modal-danger fade" id="category-delete-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Category</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete <b class="catname"></b> category?</p>
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
      $('#category_table').DataTable({
      	"order": [],
      });

      $('.deleteLink').click(function(){
      	var category_name = $(this).attr('category_name');
      	var category_row_id = $(this).attr('category_row_id');
      	console.log(category_name);
      	$('#category-delete-modal .catname').empty();
      	$('#category-delete-modal .catname').append(category_name);
      	$('#category-delete-modal .submitDeleteModal').attr('category_row_id', category_row_id);
      });

      $('.submitDeleteModal').click(function(){
      	var category_row_id = $(this).attr('category_row_id');
      	$('#deleteCategory_'+category_row_id).submit();
      });
  });
</script>
@endsection