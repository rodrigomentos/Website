@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
      <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-body ">
              <div class="col-md-4">
                <ul class="nav   nav-stacked">
                 <li class="active"><a data-toggle="tab" href="#edit"><strong>Editar Perfil</strong></a></li>
                 <li><a data-toggle="tab" href="#pass"><strong>Cambiar la Contraseña</strong></a></li>
                </ul>
              </div>

              <div class="col-md-8">
                <div class="tab-content">
                  <div id="edit" class="tab-pane fade in active">
                    <div class="form-group text-center">
                      <a data-toggle="modal" data-target="#myModal">  <img src="/img/{{ $user->biography }}" class="img-circle" alt="Cinque Terre" width="50" height="50"> </a>
                       <span class="" style="font-size:20px;"> <strong> {{$user->user}}</strong></span>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="{{ route('updateUser')}}">
                        @include('form.user')
                    </form>
                    @if(session('message'))
                    <div class="text-center text-success">
                        {{session('message')}}
                    </div>

                    @endif
                  </div>
                  <div id="pass" class="tab-pane fade">
                    <div class="form-group text-center">
                      <a>  <img src="/img/{{ $user->biography }}" class="img-circle" alt="Cinque Terre" width="50" height="50"> </a>
                       <span class="" style="font-size:20px;"> <strong> {{$user->user}}</strong></span>
                    </div>
                    <form class="form-horizontal" role="form" method="post" action="{{ route('updatePassword') }}">
                    @include('form.password')
                    </form>
                    @if(session('message'))
                    <div class="text-center text-success">
                        {{session('message')}}
                    </div>
                    @endif
                  <!-- form password-->
                  </div>

                </div>
              </div>
</div>

</div>
</div>
</div>
</div>

@include('form.biography')
@endsection
