@extends('admin.layouts.admin_template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category Create
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Category Create</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
	        <!-- left column -->
	        <div class="col-md-12">
	          <!-- general form elements -->
	          <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Create New Category</h3>
	            </div>
	            <!-- /.box-header -->
	            <!-- form start -->
	            <form role="form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
	            	@csrf
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="category_name">Category Name</label>
	                  <input type="text"  class ="form-control" id="category_name" name="category_name" placeholder = "Enter category Name">
	                </div>
	                <div class="form-group">
	                  <label for="catgory_type">Category</label>
	                  <select name="parent_id" class = "form-control" required>
                          <option value="">Select</option>
                          <option value="0"> Main Category </option>
                          @foreach($data['all_records'] as $row)
	                          <option value="{{ $row->category_row_id}}">
	                          <!-- @if($row->level == 0) <b>  @endif -->  
	                          @if($row->level == 0) <b>  @endif 
	                          @if($row->level == 1) &nbsp; - @endif   
	                          @if($row->level == 2) &nbsp; &nbsp; - - @endif     
	                          @if($row->level == 3) &nbsp; &nbsp; &nbsp; - - - @endif       
	                          @if($row->level == 4) &nbsp; &nbsp; &nbsp; &nbsp; - - - - @endif       
	                          @if($row->level == 5) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  - - - - - @endif       
	                          @if($row->level > 5)  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - - - @endif
	                          {{ $row->category_name }} 
	                          @if($row->level == 0) </b>  @endif  
	                          </option>
                          @endforeach
                        </select>
	                </div>
	                <div class="form-group">
	                  <label for="exampleInputFile">Upload Image</label>
	                  <input type="file" id="exampleInputFile" name="category_image">
	                  <p class="help-block"></p>
	                </div>
	                <div class="form-group">
	                  <label>Short Description</label>
	                  <input type="text" name="short_desc" class="form-control">
	                </div>
	                <div class="form-group">
	                  <label>Long Description</label>
	                  <textarea class="form-control" rows="3" name="long_desc"></textarea>
	                </div>
	                <div class="checkbox">
	                  <label>
	                    <input type="checkbox" name="featured_category"> Featured Category
	                  </label>
	                </div>
	              </div>
	              <!-- /.box-body -->

	              <div class="box-footer">
	                <button type="submit" class="btn btn-primary">Submit</button>
	              </div>
	            </form>
	          </div>
	          <!-- /.box -->
	      	</div>
  		</div>
	</section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection