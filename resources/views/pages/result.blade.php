@extends('layout')

@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h2>{{$answers->mark}} ball topladingiz</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Savol</th>
                      <th>Sizning javob</th>
                      <th>Natija</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($testansws as $testansw)
                      <tr>
                        <td>{{$testansw->id}}</td>
                        <td>{{$testansw->question}}</td>
                        <th>{{$testansw->answer}}</th>
                        <th>{{$testansw->javob}}</th>
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
