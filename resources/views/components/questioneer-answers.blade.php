@extends('layouts.app')

@section('content')
<style>
  #sidebar-wrapper, .menu-toggle {
    display: none !important;
  }
</style>

<!-- partial:index.partial.html -->

<div class="container d-flex justify-content-center mt-5" style="min-width:720px!important">
  <div class="col-11 col-offset-2">
    <div class="progress mt-3" style="height: 30px;">
      <div class="progress-bar progress-bar-striped progress-bar-animated" style="font-weight:bold; font-size:15px;" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="card mb-5">

      @php $i = 0; @endphp
      
      @foreach($questions_array as $question)



      @if($i==0)
      <div class="card-body p-4 step current-step">
      @else
      <div class="card-body p-5 step" style="display: none">
      @endif


    <h1 class="mb-4">{{$question->question_title}}</h1>

      @php 
        $answers_array2 = explode('|',$question->question_answer);
        $answers_array = explode('|',$question->question_wrong_answers);
        
        foreach($answers_array2 as $item) {
          array_push($answers_array,$item);
        }
        shuffle($answers_array);
      @endphp

      <div class="row">
        <div class="col-md-7 col-12">
      @foreach($answers_array as $answers)
      <div class="mb-3">
        @if(in_array($answers, $answers_array2)) 
        <input class="input-answer-correct" type="checkbox" id="scales" name="scales" data-answer="correct">
        @else
        <input class="input-answer-wrong" type="checkbox" id="scales" name="scales">
        @endif
        <label for="scales" class="text-capitalize">{{$answers}}</label>
      </div>
      @endforeach
      </div>
        <div class="col-md-5 col-12">
          <div class="border p-4">
          <h2>Užuomina</h2>

          @php $hints = explode('|',$question->question_hints); @endphp
          @foreach($hints as $hint)
          <div class="hint-div">
            <p class="hint-show m-0 mb-3 hidden border p-2">{{$hint}}</p>
            <button class="btn-primary btn hint-btn-show mb-2">Užuomina</button>
          </div>
          @endforeach

          </div>
        </div>
      </div>

      <div class="row hidden question-story">
        <h2>Klausimo istorija</h2>
        <p class="m-0">{{$question->question_story}}</p>
      </div>

      </div>
      @php $i++; @endphp
      @endforeach


      <div class="card-footer">
        <div class="d-inline atsakymo-parodymas"></div>
        <!-- <button class="action back btn btn-sm btn-outline-warning" style="display: none">Back</button> -->
        <button class="action next btn btn-sm btn-warning float-end" disabled="">Toliau</button>
        <a href="{{route('disable-questioneer', $id)}}" class="answer-last-btn answer-last-btn2 action submit btn btn-sm btn-success float-end" style="display: none">Baigti klausimyną</a>
      </div>
    </div>

  </div>
</div>
<!-- partial -->

@endsection