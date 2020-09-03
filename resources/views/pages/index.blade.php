@extends('layout')

@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">

@if (Auth::check())
<h2>Teachers:</h2>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Tests</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($teachers as $teacher)
        <tr>
          <td>{{$teacher->firstname}}</td>
          <td>{{$teacher->lastname}}</td>
          <td>{{$teacher->email}}</td>
          <th>
              <div class="form-group">
                  <a href="{{route('teacher.show', $teacher->id)}}" class="btn btn-success">Tests</a>
               </div>
          </th>
        </tr>
        @endforeach
    </tbody>
  </table>
@endif

              </div>
        </div>
    </div>
</div>

@endsection
