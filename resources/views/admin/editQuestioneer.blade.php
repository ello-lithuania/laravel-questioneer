@extends('layouts.admin')

@section('content')
<div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Redaguoti esamą klausimyną</h3>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{route('save-edited-questioneer',$id)}}" method="post" >
                                <input name="questions_list" class="hidden questioneer_input_array" value="{{$question->questions_list}}"/>
                                @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <input name="questioneer_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pavadinimas" value="{{$question->questioneer_title}}">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <textarea name="questioneer_description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Aprašymas" rows="8">{{$question->questioneer_description}}</textarea>
                                    </div>
                                </div>


                                <h3 class="box-title my-4">Pasirinkite klausimus</h3>
                            </div>
                            <div class="row">
                            @if(!empty($data))
                                @foreach($data as $key => $value)
                                <div class="col-md-3 col-6">
                                    @if(in_array($value->id, explode('|',$question->questions_list)))
                                    <button class="bg-dark text-white p-2 btn-selector-questioneer active" data-id="{{$value->id}}">{{ $value->question_title }}</button>
                                    @else
                                    <button class="bg-dark text-white p-2 btn-selector-questioneer" data-id="{{$value->id}}">{{ $value->question_title }}</button>
                                    @endif
                                </div>
                                @endforeach
                            @endif
                            </div>
                            <input class="status-input hidden" name="status" value="{{$question->status}}"/>

                            @if($question->status=='active')
                            <button class="btn btn-success text-white mt-5 btn-form-status-change">aktyvus</button>
                            @else 
                            <button class="btn btn-secondary text-white mt-5 btn-form-status-change">isjungtas</button>
                            @endif

                            <button type="submit" class="btn btn-danger text-white mt-5">Išsugoti klausimą</button>
                            </form>

                        </div>
                    </div>
                </div>

</div>
@endsection