@extends ('common.user')
@section ('content')

<h1 class="brand-header">質問編集</h1>

<div class="main-wrap">
  <div class="container">
    <form action="{{ route('question.confirm') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="user_id" value="{{ $question->user_id }}">
      <div class="form-group">
        <select name='tag_category_id' class = "form-control selectpicker form-size-small" id ="pref_id">
          <option value="{{ $question->tag_category_id }}">{{ $question->tagCategory->name }}</option>
            <option value= "1">FRONT</option>
            <option value= "2">BACK</option>
            <option value= "3">INFRA</option>
            <option value= "4">OTHERS</option>
        </select>
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="title" name="title" type="text" value="{{ old('title', $question->title) }}">
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10">{{ old('content', $question->content) }}</textarea>
        <span class="help-block"></span>
      </div>
      <input name="confirm" class="btn btn-success pull-right" type="submit" value="update">
    </form>
  </div>
</div>

@endsection

