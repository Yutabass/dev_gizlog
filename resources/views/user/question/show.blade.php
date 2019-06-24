@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
      <img src="{{ $question->user->avatar }}" class="avatar-img">
      <p>{{ $question->user->name }}&nbsp;さんの質問&nbsp;&nbsp;(&nbsp;{{ $question->tagCategory->name }}&nbsp;)</p>
      <p class="question-date">{{ $question->updated_at }}</p>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text">{{ $question->title }}</td>
          </tr>
          <tr>
            <th class="table-column">Question</th>
            <td class='td-text'>{!! nl2br(e($question->content)) !!}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
    <div class="comment-list">
      @foreach ($comments as $comment)
        <div class="comment-wrap">
          <div class="comment-title">
            <img src="{{ $comment->user->avatar }}" class="avatar-img">
            <p>{{ $comment->user->name }}</p>
            <p class="comment-date">{{ $comment->updated_at }}</p>
          </div>
          <div class="comment-body">{!! nl2br(e($comment->comment)) !!}</div>
        </div>
      @endforeach
    </div>
  <div class="comment-box">
    <form action="{{ route('question.comment') }}" method="post">
      {{ csrf_field() }}
      <input name="user_id" type="hidden" value="{{ Auth::id() }}">
      <input name="question_id" type="hidden" value="{{ $question->id }}">
      <div class="comment-title">
        <img src="{{ $question->user->avatar }}" class="avatar-img"><p>コメントを投稿する</p>
      </div>
      <div class="comment-body
        @if ($errors->has('comment'))
          {{ 'has-error' }}
        @endif
      ">
        <textarea class="form-control" placeholder="Add your comment..." name="comment" cols="50" rows="10">{{ old('comment') }}</textarea>
        @if ($errors->has('comment'))
          <span class="help-block">{{ $errors->first('comment') }}</span>
        @endif
      </div>
      <div class="comment-bottom">
        <button type="submit" class="btn btn-success">
          <i class="fa fa-pencil" aria-hidden="true"></i>
        </button>
      </div>
    </form>
  </div>
</div>

@endsection