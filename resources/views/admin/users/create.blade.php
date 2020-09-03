@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create User
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
		{{Form::open(['route'	=>	'users.store'])}}
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Creating new User</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="firstnamee">First Name</label>
              <input type="text" name="firstname" class="form-control" id="firstnamee" placeholder="" value="{{old('firstname')}}">
            </div>
            <div class="form-group">
              <label for="lastnamee">Last Name</label>
              <input type="text" name="lastname" class="form-control" id="lastnamee" placeholder="" value="{{old('lastname')}}">
            </div>
            <div class="form-group">
                <label for="emaill">E-mail</label>
                <input type="text" name="email" class="form-control" id="emaill" placeholder="" value="{{old('email')}}">
              </div>
            <div class="form-group">
              <label for="passw">Password</label>
              <input type="password" name="password" class="form-control" id="passw" placeholder="">
            </div>

        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-success pull-right">Create</button>
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
