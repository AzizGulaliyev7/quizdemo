@extends('admin.layout')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editing Questions
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Question</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
        {{Form::open(['route'=>['questions.update', $question->id], 'method'=>'put'])}}
          <div class="col-md-6">
            <input type="hidden" value="{{$question->test_id}}"  name="test_id">
            <div class="form-group">
                <label for="ques">Description</label>
                <textarea name="question" id="ques" cols="30" rows="7" class="form-control">{{old('question')}}{{$question->question}}</textarea>
            </div>
            <div class="form-group">
              <label for="av">A variant</label>
              <input type="text" class="form-control" id="av" value="{{$question->a}}" name="a">
            </div>
            <div class="form-group">
                <label for="bv">B variant</label>
                <input type="text" class="form-control" id="bv" value="{{$question->b}}" name="b">
              </div>
              <div class="form-group">
                <label for="cv">C vatiant</label>
                <input type="text" class="form-control" id="cv" value="{{$question->c}}" name="c">
              </div>
              <div class="form-group">
                <label for="cc">Correct variant</label>
                <input type="text" class="form-control" id="cc" value="{{$question->correct}}" name="correct">
              </div>
        </div>
      </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-default">Назад</button>
          <button class="btn btn-warning pull-right">Изменить</button>
        </div>
        <!-- /.box-footer-->
        {{Form::close()}}
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
