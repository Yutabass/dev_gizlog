@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問一覧</h2>
<div class="main-wrap">
  <form method="get">
    {{ csrf_field() }}
    <div class="btn-wrapper">
      <div class="search-box">
        <input class="form-control search-form" placeholder="Search words..." name="search_word" type="text" value="{{ $search_word }}">
        <button type="submit" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></button>
      </div>
      <a class="btn" href="{{ route('question.create') }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
      <a class="btn" href="{{ route('question.mypage') }}">
        <i class="fa fa-user" aria-hidden="true"></i>
      </a>
    </div>
    <div class="category-wrap">
      <div class="btn all" id="">all</div>
      <div class="btn front" id="1">FRONT</div>
      <div class="btn back" id="2">BACK</div>
      <div class="btn infra" id="3">INFRA</div>
      <div class="btn others" id="4">OTHERS</div>
      <input id="category-val" name="tag_category_id" type="hidden">
    </div>
  </form>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-1">user</th>
          <th class="col-xs-2">category</th>
          <th class="col-xs-6">title</th>
          <th class="col-xs-1">comments</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($questions as $question)
          <tr class="row">
            <td class="col-xs-1"><img src="{{ $question->user->avatar }}" class="avatar-img"></td>
            <td class="col-xs-2">{{ $question->tagCategory->name }}</td>
            <td class="col-xs-6">{{ $question->title }}</td>
            <td class="col-xs-1"><span class="point-color">{{ $question->comment->count() }}</span></td>
            <td class="col-xs-2">
              <a class="btn btn-success" href="{{ route('question.show', ['id' => $question->id]) }}">
                <i class="fa fa-comments-o" aria-hidden="true"></i>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div aria-label="Page navigation example" class="text-center"></div>
  </div>
</div>

@endsection