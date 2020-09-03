@extends('admin.layout')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit User
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
	{{Form::open([
		'route'	=>	['users.update', $user->id],
		'method'	=>	'put'

	])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit user Data</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="fist">First Name</label>
              <input type="text" class="form-control" id="fist" name="firstname" placeholder="" value="{{$user->firstname}}">
            </div>
            <div class="form-group">
                <label for="last">Last Name</label>
                <input type="text" class="form-control" id="last" name="lastname" placeholder="" value="{{$user->lastname}}">
              </div>
            <div class="form-group">
              <label for="em">E-mail</label>
              <input type="text" class="form-control" id="em" name="email" placeholder="" value="{{$user->email}}">
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" class="form-control" id="pass" name="password" placeholder="">
            </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
	{{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
