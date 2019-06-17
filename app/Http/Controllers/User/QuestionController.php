<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\QuestionsRequest;
use App\Http\Requests\User\CommentRequest;
use App\Models\Question;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $question;
    protected $comment;

    public function __construct(Question $question, Comment $comment)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->comment = $comment;
    }

    public function index(Request $request)
    {
        $categories = \DB::table('tag_categories')->get();
        $search_tag_id = $request->tag_category_id;
        $search_word = $request->search_word;
            if (!empty($search_tag_id)) {
                $questions = $this->question->where('title', 'like', "%$search_word%")->where('tag_category_id', $search_tag_id)->latest()->get();
            } else {
                $questions = $this->question->where('title', 'like', "%$search_word%")->latest()->get();
            }   
        return view('user.question.index', compact('questions', 'search_word', 'categories'));
    }

    public function create()
    {
        $categories = \DB::table('tag_categories')->get();
        return view('user.question.create', compact('categories'));
    }

    public function edit($id)
    {
        $question = $this->question->find($id);
        $categories = \DB::table('tag_categories')->get();
        return view('user.question.edit', compact('question', 'categories'));
    }

    public function confirm(QuestionsRequest $request, $id)
    {
        $input = $request->all();
        $question = $this->question->find($id)->fill($input);
        return view('user.question.confirm', compact('question'));
    }

    public function newConfirm(QuestionsRequest $request)
    {
        $input = $request->all();
        $question = $this->question->fill($input);
        return view('user.question.confirm', compact('question'));
    }

    public function post(Request $request, $id)
    {
        $input = $request->all();
        $this->question->find($id)->fill($input)->save();
        return redirect()->route('question.mypage');
    }

    public function newPost(Request $request)
    {
        $input = $request->all();
        $this->question->fill($input)->save();
        return redirect()->route('question.mypage');
    }

    public function comment(CommentRequest $request)
    {
        $input = $request->all();
        $this->comment->fill($input)->save();
        return redirect()->route('question.show',['id'=> $input['question_id']]);
    }

    public function show($id)
    {
        $question = $this->question->find($id);
        $comments = $this->comment->where('question_id', $id)->get();
        return view('user.question.show', compact('question', 'comments'));
    }
    
    public function mypage()
    {
        $login_user_id = Auth::id();
        $questions = $this->question->where('user_id', $login_user_id)->latest()->get();
        return view('user.question.mypage', compact('questions'));
    }

    public function destroy($id)
    {
        $question = $this->question->find($id);
        $question->delete();
        return redirect()->route('question.mypage');
    }

}

