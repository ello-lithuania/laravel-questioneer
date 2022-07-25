<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function displayAll()
    {
        $all_questions = Questions::all()->sortByDesc('created_at');
        return view('admin.showAllQuestions',compact('all_questions'));
    }
    public function index()
    {
        return view('admin.create');
    }
    public function save(Request $request)
    {
        $data = $request->validate([
            'question_title' => 'required',
            'question_answer' => 'required',
            'question_wrong_answers' => 'required',
            'question_hints' => 'required',
            'question_story' => 'required',
        ]);
        $request['question_answer'] = implode('|', $request->question_answer);
        $request['question_hints'] = implode('|', $request->question_hints);
        $request['question_wrong_answers'] = implode('|', $request->question_wrong_answers);

        Questions::create($request->all());

        return redirect()->route('home')->with('success', 'Klausimas sukurtas sėkmingai');
    }
    public function edit(Request $request, $id) {
        $question = Questions::where('id',$id)->first();
        return view('admin.editQuestion',compact('question','id'));
    }
    public function saveEditQuestion(Request $request, $id) {
        Questions::where('id', $id)->update([
            'question_title' => $request->question_title,
            'question_answer' => implode('|',$request->question_answer),
            'question_wrong_answers' => implode('|',$request->question_wrong_answers),
            'question_hints' => implode('|',$request->question_hints),
            'question_story' => $request->question_story
        ]);

        return redirect()->route('home')->with('success', 'Klausimas redaguotas sėkmingai');
    }
}
