@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('dailyreport.store') }}" method="post">
      {{ csrf_field() }}
      <input class="form-control" name="user_id" type="hidden">
      @if( $errors->has('reporting_time') )
        <div class="form-group form-size-small {{ 'has-error' }}">
          <input class="form-control" name="reporting_time" type="date" value="{{ old('reporting_time') }}">
          <span class="has-error help-block">{{ $errors->first('reporting_time') }}</span>
        </div>
      @endif
      @if( $errors->has('title') )
        <div class="form-group {{ 'has-error' }}">
          <input class="form-control" placeholder="Title" name="title" type="text" value="{{ old('title') }}">
          <span class="help-block">{{ $errors->first('title') }}</span>
        </div>
      @endif
      @if( $errors->has('contents') )
        <div class="form-group {{ 'has-error' }}">
          <textarea class="form-control" placeholder="Content" name="contents" cols="50" rows="10">{{ old('contents') }}</textarea>
          <span class="has-error help-block">{{ $errors->first('contents') }}</span>
        </div>
      @endif
      <button type="submit" class="btn btn-success pull-right">Add</button>
    </form>  
  </div>
</div>

@endsection

