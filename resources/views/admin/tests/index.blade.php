@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tests list
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add New Test</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('tests.create')}}" class="btn btn-success">Add Test</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Test name</th>
                  <th>Add Question</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $test)
					<tr>
	                  <td>{{$test->id}}</td>
                      <td>{{$test->name}}</td>
                      <td>
                        <div class="form-group">
                            <a href="{{route('questions.show', $test->id)}}" class="btn btn-success">Add Question</a>
                         </div>
                    </td>
	                  <td><a href="{{route('tests.edit', $test->id)}}" class="fa fa-pencil"></a>
	                  {{Form::open(['route'=>['tests.destroy', $test->id], 'method'=>'delete'])}}
	                  <button onclick="return confirm('are you sure?')" type="submit" class="delete">
	                   <i class="fa fa-remove"></i>
	                  </button>

	                   {{Form::close()}}

	                   </td>
	                </tr>
                @endforeach

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
