<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Questioneer;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions= Questions::get();
        $questions_count = $questions->count();

        $questioneer = Questioneer::where('status', 'active')->get();
        $questioneer_count = $questioneer->count();

        $all_questions = Questions::all()->sortByDesc('created_at');
        return view('home', compact('questioneer_count','questions_count', 'all_questions'));
    }
}
