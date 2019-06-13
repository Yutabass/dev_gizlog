<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $question;

    public function __construct(Question $question)
    {
        $this->middleware('auth');
        $this->question = $question;
    }

    public function index(Request $request)
    {
        $questions = $this->question->latest()->get();
        return view('user.question.index', compact('questions'));
    }

    public function create()
    {
        return view('user.question.create');
    }

    public function show($id)
    {
        $question = $this->question->find($id)->get();
        return view('user.question.show', compact('question'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $questions = $this->question->fill($input)->save();
        return redirect()->route('question.index');
    }

    public function mypage()
    {
        return view('user.question.mypage');
    }

}
