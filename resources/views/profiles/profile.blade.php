@extends('layouts.profile')

@section('contentHeader')
<div class="container contentHeader">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                	<div id="imgPort" 
                		style="background-image: url({{ Auth::User()->imgPort}});">
                        <div class="changeImg" id="changeImgPort" data-toggle="modal" data-target="#modalImgPort">
                            <svg height="25pt" viewBox="0 -1 401.52289 401" width="25pt"
                            xmlns="http://www.w3.org/2000/svg"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg>
                        </div>
                    </div>
                    <div id="imgProf" 
                        style="background-image: url({{ Auth::User()->imgProf}});">
                        <div class="changeImg" id="changeImgProf" data-toggle="modal" data-target="#modalImgProf">
                            <svg color="white" height="25pt" viewBox="0 -1 401.52289 401" width="25pt" xmlns="http://www.w3.org/2000/svg"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg>
                		</div>
                	</div>
                </div>
            </div>
                <div class="card-footer">
                  hola
                </div>
        </div>
    </div>
</div>

<!-- modalImgPortLabel -->
<div class="modal fade" id="modalImgPort" tabindex="-1" role="dialog" aria-labelledby="modalImgPortLabel" aria-hidden="true">
    <form method="POST" action="{{route('storeImgPort')}}" aria-label="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalImgPortLabel">Cambiar imagen de portada</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <div class="row">
                     <div class="col">
                        <input id="inputPort" type="file" name="inputPort" 
                            class="form-control" 
                            accept="image/x-png,image/jpeg"
                            value=""
                            required>
                     </div>
                </div>
                <div class="row">
                     <div class="col mt-4 showPreviewImg" id="showPort">
                    </div>
                 </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Aceptar</button>
          </div>
        </div>
      </div>
    </form>
</div>

<!-- modalImgProfLabel -->
<div class="modal fade" id="modalImgProf" tabindex="-1" role="dialog" aria-labelledby="modalImgProfLabel" aria-hidden="true">
    <form method="POST" action="{{route('storeImgProf')}}" aria-label="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalImgProfLabel">Cambiar imagen de perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                    <div class="row">
                         <div class="col">
                            <input id="inputProf" type="file" name="inputProf" 
                                class="form-control" 
                                accept="image/x-png,image/jpeg"
                                value=""
                                required>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col mt-4 showPreviewImg" id="showProf">
                        </div>
                     </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                	hola
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('aside-left')

@endsection

@section('aside-rigth')

@endsection
