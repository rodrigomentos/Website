<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
              <div class="panel-body ">

                <div class="media">
                    <div class="media-left">
                      <img src="/img/{{ $post->user->biography }}" class="media-object" style="width:45px">
                    </div>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="/{{$post->user->user}}">{{$post->user->name}} {{$post->user->lastname}}</a> <small>
                      <i>Posted {{ $post->created_at->toDayDateTimeString() }}</i></small></h4>
                      <p>{{$post->content}}</p>
                      <div class="media">

                        <form  action="{{ route('coments') }}" method="post">
                            {{ csrf_field() }}
                          <div class="input-group">
                            <input type="hidden" class="form-control" name="post" value="{{$post->id}}" >
                            <input type="text" class="form-control" name="coment" placeholder="coment....">
                            <div class="input-group-btn">
                              <button class="btn btn-primary" type="submit">Coment</button>
                            </div>
                          </div>
                          @if ($errors->has('coment'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('coment') }}</strong>
                              </span>
                          @endif
                        </form>
                        <br>

                          @foreach($post->coments as $coment)
                  <div class="media-left">
                    <img src="/img/{{ $coment->user->biography }}" class="media-object" style="width:45px">
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">  <a href="/{{$coment->user->user}}">{{$coment->user->name }} {{$coment->user->lastname}}</a> <small><i>Comented  {{$coment->created_at->toDayDateTimeString()}}</i></small></h4>
                    <p>  {{$coment->coment}}</p>
                  </div>
                  <br>
                    @endforeach
                </div>
                </div>
                </div>
                    </div>
                  </div>


              </div>
            </div>
        </div>
    </div>
</div>
