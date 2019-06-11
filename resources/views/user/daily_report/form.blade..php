     @if( $errors->has('reporting_time') )
        <div class="form-group form-size-small {{ 'has-error' }}">
          <input class="form-control" name="reporting_time" type="date" value="{{ old('reporting_time') }}">
          <span class="help-block">{{ $errors->first('reporting_time') }}</span>
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
          <span class="help-block">{{ $errors->first('contents') }}</span>
        </div>
      @endif
