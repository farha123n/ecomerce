@extends('admin.layouts.admin_template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Create New Role</li>
      </ol>
      <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
      </div>
    </section>
    

    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
           @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
           @endforeach
        </ul>
      </div>
    @endif

    <!-- Main content -->
    <section class="content">
      {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Permission:</strong>
                  <br/>
                  @foreach($permission as $value)
                      <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                      {{ $value->name }}</label>
                  <br/>
                  @endforeach
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
      {!! Form::close() !!}
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection