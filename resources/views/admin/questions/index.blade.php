@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Questions
        <small></small>
      </h1>
      <ol class="breadcrumb">

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Adding Questions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('questions.quest', $testid)}}" class="btn btn-success">Add</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Question</th>
                  <th>A variant</th>
                  <th>B variant</th>
                  <th>C variant</th>
                  <th>Correct</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
					<tr>
	                  <td>{{$question->id}}</td>
                      <td>{{$question->question}}</td>
                      <td>{{$question->a}}</td>
                      <td>{{$question->b}}</td>
                      <td>{{$question->c}}</td>
                      <td>{{$question->correct}}</td>
	                  <td><a href="{{route('questions.edit', $question->id)}}" class="fa fa-pencil"></a>
	                  {{Form::open(['route'=>['questions.destroy', $question->id], 'method'=>'delete'])}}
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
