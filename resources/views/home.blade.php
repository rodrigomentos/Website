@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
<div class="panel-heading"><label for="">¿Que estas pensando?</label></div>
<div class="panel-body ">

  <form class=" " action="{{ route('post') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
      <textarea class="form-control" rows="4" id="content" name="content" required></textarea>
      @if ($errors->has('content'))
          <span class="help-block">
              <strong>{{ $errors->first('content') }}</strong>
          </span>
      @endif
    </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary pull-right" name="button">Enviar</button>
      </div>
  </form>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('post')

@foreach($posts as $post)
   @include('posts.post')

@endforeach

@endsection
