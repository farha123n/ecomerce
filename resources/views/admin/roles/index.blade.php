@extends('admin.layouts.admin_template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Roles Management</li>
      </ol>
      <div class="pull-right">
        @can('role-create')
          <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
        @endcan
      </div>
    </section>
    

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
    @endif

    <!-- Main content -->
    <section class="content">
    <div class="row">
          <div class="box">
            <div class="box-body">
              
              <table class="table table-bordered">
                <tr>
                   <th>No</th>
                   <th>Name</th>
                   <th width="280px">Action</th>
                </tr>
                  @foreach ($roles as $key => $role)
                  <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $role->name }}</td>
                      <td>
                          <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                          @can('role-edit')
                              <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                          @endcan
                          @can('role-delete')
                              {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                              {!! Form::close() !!}
                          @endcan
                      </td>
                  </tr>
                  @endforeach
              </table>

              {!! $roles->render() !!}

            </div>
          </div>
      </div>
  </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection