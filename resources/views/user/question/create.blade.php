@extends ('common.user')
@section ('content')

<h2 class="brand-header">質問投稿</h2>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('question.new.confirm') }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <div class="form-group
        @if ($errors->has('tag_category_id'))
          {{ 'has-error' }} 
        @endif
      ">
        <select name='tag_category_id' class = "form-control selectpicker form-size-small" id="pref_id">
          <option value="">Select category</option>
          @foreach ($categories as $category)
            <option value= "{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
        @if ($errors->has('tag_category_id'))
          <span class="help-block">{{ $errors->first('tag_category_id') }}</span>
        @endif
      </div>
      <div class="form-group
        @if ($errors->has('title'))
          {{ 'has-error' }} 
        @endif
      ">
        <input class="form-control" placeholder="title" name="title" type="text" value="{{ old('title') }}">
        @if ($errors->has('title'))
          <span class="help-block">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="form-group
      @if ($errors->has('content'))
        {{ 'has-error' }} 
      @endif
      ">
        <textarea class="form-control" placeholder="Please write down your question here..." name="content" cols="50" rows="10">{{ old('content') }}</textarea>
        @if ($errors->has('content'))
          <span class="help-block">{{ $errors->first('content') }}</span>
        @endif
      </div>
      <input name="confirm" class="btn btn-success pull-right" type="submit" value="create">
    </form>
  </div>
</div>

@endsection