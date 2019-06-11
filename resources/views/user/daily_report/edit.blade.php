@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('dailyreport.update',['id'=>$dailyreport->id]) }}" method="post">
      {{ csrf_field() }}
      <input class="form-control" name="user_id" type="hidden" value="4">
      @if( $errors->has('reporting_time') )
        <div class="form-group form-size-small {{ 'has-error' }}">
          <input class="form-control" name="reporting_time" type="date" value="{{ old('reporting_time',$dailyreport->reporting_time) }}" >       
          <span class="help-block">{{ $errors->first('reporting_time') }}</span>
        </div>
      @endif
      if( $errors->has('title') )
        <div class="form-group {{ 'has-error' }}">
          <input class="form-control" placeholder="Title" name="title" type="text" value="{{ old('title',$dailyreport->title) }}">
          <span class="help-block">{{ $errors->first('title') }}</span>
        </div>
      @endif
      @if( $errors->has('contents') )
        <div class="form-group {{ 'has-error' }}">
          <textarea class="form-control" placeholder="本文" name="contents" cols="50" rows="10">{{ old('contents',$dailyreport->contents) }}</textarea>
          <span class="help-block">{{ $errors->first('contents') }}</span>
        </div>
      @endif
      <button type="submit" class="btn btn-success pull-right">Update</button>
    </form>
  </div>
</div>

@endsection

