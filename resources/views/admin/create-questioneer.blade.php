@extends('layouts.admin')

@section('content')
<div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Sukurti naują klausimyną</h3>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{route('save-questioneer')}}" method="post" >
                                <input name="questions_list" class="hidden questioneer_input_array"/>
                                @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <input name="questioneer_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pavadinimas">
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <textarea name="questioneer_description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Aprašymas" rows="8"></textarea>
                                    </div>
                                </div>


                                <h3 class="box-title my-4">Pasirinkite klausimus</h3>
                            </div>
                            <div class="row">
                            @if(!empty($data))
                                @foreach($data as $key => $value)
                                <div class="col-md-3 col-6">
                                    <a class="bg-dark text-white p-2 btn-selector-questioneer" data-id="{{$value->id}}">{{ $value->question_title }}</a>
                                </div>
                                @endforeach
                            @endif
                            </div>

                            <button type="submit" class="btn btn-danger text-white mt-5">Išsugoti klausimą</button>
                            </form>

                        </div>
                    </div>
                </div>

</div>
@endsection