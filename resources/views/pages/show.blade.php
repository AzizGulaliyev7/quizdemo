@extends('layout')

@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h2>Tests that belongs to {{$teacher->firstname}} {{$teacher->lastname}}</h2>


                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Test Name</th>
                      <th>Questions</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($tests as $test)
                      <tr>
                        <td>{{$test->id}}</td>
                        <td>{{$test->name}}</td>
                        <th>
                            <div class="form-group">
                                <a href="{{route('test.show', $test->id)}}" class="btn btn-success">Questions</a>
                             </div>
                        </th>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>
<!-- end main content-->
@endsection
