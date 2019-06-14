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
        $search_tag_id = $request->tag_category_id;
        $search_word = $request->search_word;
        if (!empty($search_tag_id) && $search_tag_id >= 1) {
            $questions = $this->question->where('title', 'like', "%$search_word%")->where('tag_category_id', '=', $search_tag_id)->get();
        } else {   
            $questions = $this->question->latest()->get();
        }

        $login_user_id = Auth::id();
        return view('user.question.index', compact('questions', 'login_user_id'));
    }

    public function create()
    {
        return view('user.question.create');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $question = $this->question->fill($input)->save();
        return redirect()->route('question.index');
    }

    public function edit($id)
    {
        $question = $this->question->find($id);
        return view('user.question.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $question = $this->question->find($id)->fill($input)->save();
        $login_user_id = Auth::id();
        return redirect()->route('question.mypage', ['user_id' => $login_user_id]);
    }

    public function show($id)
    {
        $question = $this->question->find($id);
        return view('user.question.show', compact('question'));
    }
    
    public function mypage($login_user_id)
    {
        $questions = $this->question->where('user_id', '=', $login_user_id)->get();
        return view('user.question.mypage', compact('questions'));
    }

    public function destroy($id)
    {
        $question = $this->question->find($id);
        $question->delete();
        return redirect()->back();
    }

}
