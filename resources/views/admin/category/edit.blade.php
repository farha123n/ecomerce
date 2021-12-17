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
        <li class="active">Edit Category</li>
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
                <h3 class="box-title">Edit Category</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="{{ url('admin/category').'/'.$data['single_info']->category_row_id }}" method="POST">
                {{ method_field('PUT') }}
                @csrf
                <input type="hidden"  name="category_row_id" value="{{ $data['single_info']->category_row_id }}" />
                <div class="box-body">
                  <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text"  class ="form-control" id="category_name" name="category_name" placeholder = "Enter category Name" value="{{ $data['single_info']->category_name }}">
                  </div>
                  <div class="form-group">
                    <label for="catgory_type">Category</label>
                    <select name="parent_id" class = "form-control" required>
                          <option value="" @if( $data['single_info']->parent_id == 0 ) selected = "selected" @endif>Select</option>
                         <option value="0" @if( $data['single_info']->parent_id == 0 ) selected = "selected" @endif> Main Category </option>
                          @foreach($data['all_records'] as $row)
                            <option value="{{ $row->category_row_id }}" @if($data['single_info']->category_row_id == $row->category_row_id) selected = "selected" @endif>
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
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">

                    <p class="help-block">Example block-level help text here.</p>
                  </div> -->
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Check me out
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