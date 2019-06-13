@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問投稿</h2>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('question.store') }}" method="post">
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      {{ csrf_field() }}
      <div class="form-group">
        <select name='tag_category_id' class = "form-control selectpicker form-size-small" id="pref_id">
          <option value="">Select category</option>
            <option value= "1">FRONT</option>
            <option value= "2">BACK</option>
            <option value= "3">INFRA</option>
            <option value= "4">OTHERS</option>
        </select>
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="title" name="title" type="text">
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10"></textarea>
        <span class="help-block"></span>
      </div>
      <input name="confirm" class="btn btn-success pull-right" type="submit" value="create">
    </form>
  </div>
</div>

@endsection

