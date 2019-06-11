@extends ('common.user')
@section ('content')

<h2 class="brand-header">日報作成</h2>
<div class="main-wrap">
  <div class="container">
    <form action="{{ route('dailyreport.store') }}" method="post">
      {{ csrf_field() }}
      <input class="form-control" name="user_id" type="hidden">
        <div class="form-group form-size-small  
          @if( $errors->has('reporting_time') )
            {{ 'has-error' }}
          @endif
        "> 
          <input class="form-control" name="reporting_time" type="date" value="{{ old('reporting_time') }}">
          @if( $errors->has('reporting_time') )
            <span class="help-block">{{ $errors->first('reporting_time') }}</span>
          @endif
        </div>
        <div class="form-group 
          @if( $errors->has('title') )
            {{ 'has-error' }}
          @endif
        ">
          <input class="form-control" placeholder="Title" name="title" type="text" value="{{ old('title') }}">
          @if( $errors->has('title') )
            <span class="help-block">{{ $errors->first('title') }}</span>
          @endif
        </div>
        <div class="form-group 
          @if( $errors->has('contents') )
            {{ 'has-error' }}
          @endif
        ">
          <textarea class="form-control" placeholder="Content" name="contents" cols="50" rows="10">{{ old('contents') }}</textarea>
          @if( $errors->has('title') )
            <span class="help-block">{{ $errors->first('contents') }}</span>
          @endif
        </div>
      <button type="submit" class="btn btn-success pull-right">Add</button>
    </form>  
  </div>
</div>

@endsection

