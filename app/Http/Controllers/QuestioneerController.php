<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Questioneer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuestioneerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayAll() {
        $all_questions = Questioneer::get();
        return view('admin.showQuestioneers',compact('all_questions'));
    }
    public function index(Request $request, $id)
    {
        $data = Questioneer::where('questioneer_key', $request->search_input)->where('status','active')->first();
        if(empty($data)) {
            return redirect()->route('welcome')->with('error', 'Klausimynas nerastas');
        }
        $questions_array = [];
        foreach(explode(',',$data->questions_list) as $question) {
            $question_result = Questions::where('id',$question)->first();
            $questions_array[$question] = $question_result;
        } 
        return view('components.questioneer-answers', compact('questions_array', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save()
    {
        $data = Questions::get();
        return view('admin.create-questioneer',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id)
    {
        $questioneer = Questioneer::where('questioneer_key', $id)->first();
        if($questioneer->status=='active') {
        Questioneer::where('questioneer_key', $id)->update([
            'status' => 'false'
        ]); }
        if($questioneer->status=='false') {
            Questioneer::where('questioneer_key', $id)->update([
                'status' => 'active'
            ]); }
        return redirect()->route('welcome')->with('success', 'Klausimynas išspręstas');
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'questions_list' => 'required'
        ]);

        $request['questioneer_key'] = Str::random(12);
        Questioneer::create($request->all());
        return redirect()->route('home')->with('success', 'Klausimynas sukurtas sėkmingai');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $question = Questioneer::where('id',$id)->first();
        $data = Questions::get();
        return view('admin.editQuestioneer',compact('question','id','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Questioneer::where('id', $id)->update([
            'questioneer_title' => $request->questioneer_title,
            'questions_list' => $request->questions_list,
            'questioneer_description' => $request->questioneer_description,
            'status' => $request->status
        ]);
        return redirect()->route('home')->with('success', 'Klausimynas atnaujintas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}
