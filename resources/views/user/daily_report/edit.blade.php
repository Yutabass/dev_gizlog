@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('dailyreport.update', ['id'=>$dailyreport->id]) }}" method="post">
      <input name="_method" type="hidden" value="PUT">
      {{ csrf_field() }}
      <input class="form-control" name="user_id" type="hidden" value="{{ $dailyreport->user_id }}">
        <div class="form-group form-size-small  
          @if ($errors->has('reporting_time'))
            {{ 'has-error' }}
          @endif
        "> 
          <input class="form-control" name="reporting_time" type="date" value="{{ old('reporting_time', $dailyreport->reporting_time) }}">
          @if ($errors->has('reporting_time'))
            <span class="help-block">{{ $errors->first('reporting_time') }}</span>
          @endif
        </div>
        <div class="form-group 
          @if ($errors->has('title'))
            {{ 'has-error' }}
          @endif
        ">
          <input class="form-control" placeholder="Title" name="title" type="text" value="{{ old('title', $dailyreport->title) }}">
          @if ($errors->has('title'))
            <span class="help-block">{{ $errors->first('title') }}</span>
          @endif
        </div>
        <div class="form-group 
          @if ($errors->has('contents'))
            {{ 'has-error' }}
          @endif
        ">
          <textarea class="form-control" placeholder="Content" name="contents" cols="50" rows="10">{{ old('contents',$dailyreport->contents) }}</textarea>
          @if ($errors->has('contents'))
            <span class="help-block">{{ $errors->first('contents') }}</span>
          @endif
        </div>     
      <button type="submit" class="btn btn-success pull-right">Update</button>
    </form>
  </div>
</div>

@endsection