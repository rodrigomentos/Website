
@extends('layouts.app')
@section('content')
<div class="container col-md-8 col-md-offset-2">
  <div class="row">
    <div class="col-sm-3">
    @if(Auth::user()->id == $user->id)
    <a  data-toggle="modal" data-target="#myModal">  <img src="/img/{{ $user->biography }}" class="img-circle" alt="performance" width="150" height="150"></a>
    @else
     <img src="/img/{{ $user->biography }}" class="img-circle" alt="performance" width="150" height="150">
    @endif
    </div>
    <div class="col-sm-5">
      <div class="col-sm-6">
      <h1><strong> {{$user->user}}</strong></h1>
      </div>
      <div class="col-sm-6 "><br>
        @if(Auth::user()->id == $user->id)
        <a  href="/accounts/edit/" class="btn btn-default" name="button"><strong>Editar perfil</strong></a>
        @endif
      </div>
    </div>
    <div class="col-sm-5">
    <strong class="text-center">

    <div class="col-sm-4">
    {{$user->count_my_posts()}}

    <p>publicaciones</p>
    </div>
    <div class="col-sm-4">
    {{$user->count_my_coments()}}
    <p>comentarios</p>
    </div>
    <div class="col-sm-4">
    {{$user->count_my_posts()}}
    <p>en proceso..</p>
    </div>
    </strong>
      <h3><strong> {{$user->name}}  {{$user->lastname}}</strong></h3>
  </div>
</div>
</div>

@include('form.biography')
@endsection

  @section('post')
  <div class="biography-post">
  @foreach($posts as $post)
  @include('posts.post')
  @endforeach
  <div class="text-center">
      {{ $posts->links() }}
  </div>

  </div>
  @endsection
