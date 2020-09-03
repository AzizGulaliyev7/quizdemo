@extends('layout')

@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <h3>Har bir togri javob uchun 2 ball</h3>
                {!! Form::open(['route'=>'test.store']) !!}
                <input type="hidden" name="teacherid" value="{{$teacherid}}">
                <input type="hidden" name="testid" value="{{$testid}}">

                   @foreach ($questions as $question)
                   <input type="hidden" name="count" value="{{$loop->count}}">
                   <h4 style="text-align: center">{{$loop->iteration}}-Savol:</h4>
                    <h4 style="text-align: center">{{$question->question}}</h4>


              <input type="hidden" name="question{{$loop->iteration}}" value="{{$question->question}}">
              <input type="hidden" name="id{{$loop->iteration}}" value="{{$question->id}}">
              <div class='custom-control custom-radio'>
                <input type="radio" class="custom-control-input" id="a{{$loop->iteration}}" value="a" name="answ{{$loop->iteration}}">
                <label class="custom-control-label" for="a{{$loop->iteration}}">{{$question->a}}</label>
              </div>

              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="b{{$loop->iteration}}" value="b" name="answ{{$loop->iteration}}">
                <label class="custom-control-label" for="b{{$loop->iteration}}">{{$question->b}}</label>
              </div>

              <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="c{{$loop->iteration}}" value="c" name="answ{{$loop->iteration}}">
                <label class="custom-control-label" for="c{{$loop->iteration}}">{{$question->c}}</label>
              </div>

                   @endforeach


                    <br><button type="submit" class="btn btn-primary">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
@endsection
