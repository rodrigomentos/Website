@if(Auth::user()->id == $user->id)
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header btn-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title text-center ">Cambiar foto del perfil</h4>
        </div>
        <div class="modal-body">

          @if($user->biography != 'woman.jpg' && $user->biography != 'man.jpg')
            <form method="post" action="{{route('deletebiography',$user->id)}}" id="deletebiography" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label class="btn btn-default btn-file btn-block">
                  Eliminar foto actual<input type="submit"  style="display: none; " name="biography" accept="image/*" id="biography">
                </label>

          </form>
          @endif
          <!-- form save o change image-->
          <!-- <nav class="btn btn-default btn-block">Cargar una foto</nav> -->
          <form method="post" action="{{route('savebiography')}}" id="savebiography" enctype="multipart/form-data">
              {{ csrf_field() }}
            <label class="btn btn-default btn-file btn-block">
                Cargar una foto <input type="file"  onchange="this.form.submit()" style="display: none; " name="biography" accept="image/*" id="biography">
            </label>
          </form>
          <!-- end form-->
          <nav class="btn btn-default btn-block" data-dismiss="modal">Cancelar</nav>
        </div>
      </div>
    </div>
  </div>
  @endif
