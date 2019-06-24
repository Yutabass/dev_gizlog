<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\User\QuestionsRequest;
use App\Http\Requests\User\CommentRequest;
use App\Models\Question;
use App\Models\Comment;
use App\Models\TagCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $question;
    protected $comment;
    protected $tagCategory;

    public function __construct(Question $question, Comment $comment, TagCategory $tagCategory)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->comment = $comment;
        $this->tagCategory = $tagCategory;
    }

    public function index(Request $request)
    {
        $categories = $this->tagCategory->all();
        $search_tag_id = $request->tag_category_id;
        $search_word = $request->search_word;
        $questions = $this->question->searchFromFormAndCategoey($search_tag_id, $search_word); 
        return view('user.question.index', compact('questions', 'search_word', 'categories'));
    }

    public function create()
    {
        $categories = $this->tagCategory->all();
        return view('user.question.create', compact('categories'));
    }

    public function edit($id)
    {
        $question = $this->question->find($id);
        $categories = $this->tagCategory->all();
        return view('user.question.edit', compact('question', 'categories'));
    }

    public function confirm(QuestionsRequest $request, $id = NULL)
    {
        $input = $request->all();
        if ($id) {
            $question = $this->question->find($id)->fill($input);
        } else {
            $question = $this->question->fill($input);
        }
        return view('user.question.confirm', compact('question'));
    }

    public function post(Request $request, $id = NULL)
    {
        $input = $request->all();
        if ($id) {
            $this->question->find($id)->fill($input)->save();
        } else {
            $this->question->fill($input)->save();
        }
        return redirect()->route('question.mypage');
    }

    public function comment(CommentRequest $request)
    {
        $input = $request->all();
        $this->comment->fill($input)->save();
        return redirect()->route('question.show', ['question_id'=> $input['question_id']]);
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
        $this->question->find($id)->delete();
        return redirect()->route('question.mypage');
    }
    
}

