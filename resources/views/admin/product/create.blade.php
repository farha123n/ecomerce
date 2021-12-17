@extends('admin.layouts.admin_template')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Product Add
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add New Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add New Product</h3>
        </div>

        <form role="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        	@csrf
	        <!-- /.box-header -->
	        <div class="box-body">
	          <div class="row">
	            <div class="col-md-6">
	              <div class="form-group">
	                <label>Product name</label>
	                <input type="text"  class ="form-control" id="product_name" name="product_name" placeholder = "Enter Product Name">
	              </div>

	              <div class="form-group">
	                <label>Product Base Price</label>
	                <input type="text"  class ="form-control" id="product_base_price" name="product_base_price" placeholder = "Enter Price">
	              </div>

	              <div class="form-group">
	                <label>Product Offer Price</label>
	                <input type="text"  class ="form-control" id="product_offer_price" name="product_offer_price" placeholder = "Enter Price">
	              </div>

	              <div class="form-group">
	                  <label for="catgory_type">Category</label>
	                  <select name="category_row_id" class = "form-control" required>
                          <option value="">Select</option>
                          <!-- <option value="0"> Main Category </option> -->
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
	                <label>Product Short Description</label>
	                <input type="text"  class ="form-control" id="product_short_description" name="product_short_description">
	              </div>

	              <div class="form-group">
	                <label>Product Long Description</label>
	                <input type="text"  class ="form-control" id="product_long_description" name="product_long_description">
	              </div>

	              <div class="box-footer">
		          	<button type="submit" class="btn btn-primary">Submit</button>
		          </div>
	            </div>
	            <!-- /.col -->

	            <div class="col-md-6">

	              <div class="form-group">
	                <label>Product Height</label>
	                <input type="text"  class ="form-control" id="product_height" name="product_height" placeholder = "Enter Height">
	              </div>

	              <div class="form-group">
	                <label>Product Width</label>
	                <input type="text"  class ="form-control" id="product_width" name="product_width" placeholder = "Enter Width">
	              </div>

	              <div class="form-group">
	                <label>Product Weight</label>
	                <input type="text"  class ="form-control" id="product_weight" name="product_weight" placeholder = "Enter Weight">
	              </div>

	              <div class="form-group">
	                <label>Product SKU</label>
	                <input type="text"  class ="form-control" id="product_sku" name="product_sku" placeholder = "Enter stock-keeping unit">
	              </div>

	              <div class="form-group">
		            <label for="exampleInputFile">Upload Prodcut Image</label>
		            <input type="file" id="exampleInputFile" name="product_image">
		            <p class="help-block"></p>
		          </div>

		          <div class="checkbox">
	                <label>
	                  <input type="checkbox" name="featured_product"> Featured Product
	                </label>
	              </div>

	            </div>
	            <!-- /.col -->      
		</form>
	          </div>
	          <!-- /.row -->
        	</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection