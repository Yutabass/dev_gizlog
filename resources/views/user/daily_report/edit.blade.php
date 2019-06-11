@extends ('common.user')
@section ('content')

<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('dailyreport.update',['id'=>$dailyreport->id]) }}" method="post">
      {{ csrf_field() }}
      <input class="form-control" name="user_id" type="hidden" value="4">
      <div class="form-group form-size-small ">
        <input class="form-control" name="reporting_time" type="date" value="{{ old('reporting_time',$dailyreport->reporting_time) }}" >
        @if( $errors->has('reporting_time') )
        <span class="has-error help-block">{{ $errors->first('reporting_time') }}</span>
        @endif
      </div>
      <div class="form-group">
        <input class="form-control" placeholder="Title" name="title" type="text" value="{{ old('title',$dailyreport->title) }}">
        @if( $errors->has('title') )
        <span class="has-error help-block">{{ $errors->first('title') }}</span>
        @endif
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="本文" name="contents" cols="50" rows="10">{{ old('contents',$dailyreport->contents) }}</textarea>
        @if( $errors->has('contents') )
        <span class="has-error help-block">{{ $errors->first('contents') }}</span>
        @endif
      </div>
      <button type="submit" class="btn btn-success pull-right">Update</button>
    </form>
  </div>
</div>

@endsection

