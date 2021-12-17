@extends('admin.layouts.admin_template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Users Management</li>
      </ol>
      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
                 <th>Email</th>
                 <th>Roles</th>
                 <th width="280px">Action</th>
               </tr>
               @foreach ($data as $key => $user)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if(!empty($user->getRoleNames()))
                      @foreach($user->getRoleNames() as $v)
                         <label class="badge badge-success">{{ $v }}</label>
                      @endforeach
                    @endif
                  </td>
                  <td>
                     <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                     <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                      {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                      {!! Form::close() !!}
                  </td>
                </tr>
               @endforeach
              </table>
            </div>
          </div>
      </div>
  </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection