@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List of available Tests
        <small></small>
      </h1>
      <ol class="breadcrumb">

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Test name</th>
                  <th>Results</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $test)
					<tr>
	                  <td>{{$test->id}}</td>
                      <td>{{$test->name}}</td>
                      <td>
                        <div class="form-group">
                            <a href="{{route('results.list', $test->id)}}" class="btn btn-success">Results</a>
                         </div>
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
