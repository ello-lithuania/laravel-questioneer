@extends('layouts.admin')

@section('content')
<div class="container-fluid">

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Sukurti naują klausymą</h3>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="hidden">
                                <div class="input-group mb-3" id="question_correct_answers">
                                    <input name="question_answer[]" type="text" class="form-control" placeholder="Klausimo teisingas atsakymas" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-delete-input-group" type="button">Trinti</button>
                                    </div>
                                </div>

                                <div class="input-group mb-3" id="question_wrong_answers">
                                    <input name="question_wrong_answers[]" type="text" class="form-control" placeholder="Klausimo neteisingas atsakymas" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-delete-input-group" type="button">Trinti</button>
                                    </div>
                                </div>

                                <div class="input-group mb-3" id="question-hint-group">
                                    <input name="question_hints[]" type="text" class="form-control" placeholder="Klausimo užuomina" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary btn-delete-input-group" type="button">Trinti</button>
                                    </div>
                                </div>

                            </div>

                            <form action="{{route('save-question')}}" method="post" >
                                @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <input name="question_title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Suformuluotas klausimas">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">Klausimo teisingi atsakimai</label>
                                    <div class="form-group">
                                        <input name="question_answer[]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Klausimo teisingas atsakymas">
                                    </div>
                                    <button class="btn-add-more-correct-answers btn btn-primary btn-small mb-4">Pridėti</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">Klausimo neteisingi atsakimai</label>
                                    <div class="form-group">
                                        <input name="question_wrong_answers[]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Klausimo neteisingas atsakymas">
                                    </div>
                                    <button class="btn-add-more-wrong-answers btn btn-primary btn-small mb-4">Pridėti</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">Klausimo užuominos</label>
                                    <div class="form-group" id="question-hint-group">
                                        <input name="question_hints[]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Klausimo užuomina">
                                    </div>
                                    <button class="btn-add-more-hints btn btn-primary btn-small mb-4">Pridėti</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">Klausimo istorija</label>
                                    <div class="form-group">
                                        <textarea rows="8" name="question_story" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Trumpa klausimo istorija, neatsakius teisingai"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger text-white">Išsugoti klausimą</button>
                            </form>

                        </div>
                    </div>
                </div>

</div>
@endsection