@extends ('common.user')
@section ('content')

<h2 class="brand-header">投稿内容確認</h2>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
    {{ $question->tagCategory->name }}の質問
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
  <div class="btn-bottom-wrapper">
    @if ($question->id)
      <form action="{{ route('question.edit.post', ['question_id' => $question->id]) }}" method="post">
    @else
      <form action="{{ route('question.create.post') }}" method="post">
    @endif
      {{ csrf_field() }}
      <input name="user_id" type="hidden" value="{{ $question->user_id }}">
      <input name="tag_category_id" type="hidden" value="{{ $question->tag_category_id }}">
      <input name="title" type="hidden" value="{{ $question->title }}">
      <input name="content" type="hidden" value="{{ $question->content }}">
      <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
    </form>
  </div>
</div>

@endsection