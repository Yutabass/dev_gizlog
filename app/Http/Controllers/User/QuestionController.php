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

    public function index()
    {
        return view('user.question.index');
    }

    public function create()
    {
        return view('user.question.create');
    }

    public function mypage()
    {
        return view('user.question.mypage');
    }

}
