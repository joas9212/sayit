@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenido!
                    <?php
                        if(isset($return)){
                            $topics = $return;
                        }else{
                            $topics = App\Topics::all()->reverse();
                        }
                    ?>
                    @foreach ($topics as $topic)
    <div class="container listComent">
        <div class="container py-2 px-0">
            <div class="row mt-2 mb-0">
                <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0 
                            d-none d-sm-block">
                    <div id="divImgListComent">
                        <img id="imgListComent" src="{{$topic->user->imgProf}}">
                    </div>
                </div>
                <div class="col-12 col-sm-11 col-md-11 col-lg-11 col-xl-11">
                    <div class="container">
                        <div class="row p-0">
                            <div class="col p-0">
                                <?php
                                    $date = new DateTime('2000-01-01');
                                    $datetime1 = new DateTime($topic->created_at);
                                    $datetime2 = new DateTime();
                                    $interval = $datetime1->diff($datetime2);
                                    $r="";
                                    if($interval->y > 0){
                                        if ($interval->y == 1) {
                                            $r = $r.$interval->y.' a, ';
                                        }else{
                                            $r = $r.$interval->y.' a, ';
                                        }
                                    }
                                    if($interval->m > 0){
                                        if ($interval->m == 1) {
                                            $r = $r.$interval->m.' m, ';
                                        }else{
                                            $r = $r.$interval->m.' m, ';
                                        }
                                    }
                                    if($interval->d > 0){
                                        if ($interval->d == 1) {
                                            $r = $r.$interval->d.' d, ';
                                        }else{
                                            $r = $r.$interval->d.' d, ';
                                        }
                                    }
                                    if($interval->h > 0){
                                        if ($interval->h == 1) {
                                            $r = $r.$interval->h.' h, ';
                                        }else{
                                            $r = $r.$interval->h.' h, ';
                                        }
                                    }
                                    if($interval->i > 0){
                                        if ($interval->i == 1) {
                                            $r = $r.$interval->i.' m';
                                        }else{
                                            $r = $r.$interval->i.' m';
                                        }
                                    }else{
                                        $r = $r.$interval->s.' s';
                                    }
                                ?>
                                <p id="textarea">
                                    <strong>{{Auth::User()->name}}</strong>  
                                    <em>{{Auth::User()->email}} - {{$r}}</em> 
                                </p>
                            </div> 
                        </div>
                        <div class="row p-0">
                            <div class="col p-0">
                                <p id="textarea" class="titleTopic" data-toggle="modal" data-target="#modalListComents{{$topic->id}}">{{$topic->topic}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0"></div>
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                    @if($topic->images->count() > 0)
                        <div class="mt-0 showListImg" id="showListImgComent" onclick="clickTopic()">
                            <div id="contenImgs">
                                @foreach($topic->images as $image)
                                    <div id="contentOnlyOneImg">
                                        <img src="{{$image->path}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 pr-3 pl-0"></div>
            </div>
            <div class="row mb-1 mt-0">
                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div id="options" class="container">
                                    <div class="row" style="width: 100px !important">
                                        <div class="contLike col" onclick="like(1, {{Auth::User()->id}}, {{$topic->id}} , '{{ csrf_token() }}', this);">
                                        @if(App\LikesTopics::TopicsOfUser($topic->id,Auth::User()->id)->get()->first()!==null)
                                            <svg version="1.1" id="withlike" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 426.668 426.668" style="enable-background:new 0 0 426.668 426.668;" xml:space="preserve">
                                        @else
                                            <svg version="1.1" id="like" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                 viewBox="0 0 426.668 426.668" style="enable-background:new 0 0 426.668 426.668;" xml:space="preserve">
                                        @endif
                                            <path  d="M401.788,74.476c-63.492-82.432-188.446-33.792-188.446,49.92
                                                c0-83.712-124.962-132.356-188.463-49.92c-65.63,85.222-0.943,234.509,188.459,320.265
                                                C402.731,308.985,467.418,159.698,401.788,74.476z"/>
                                            </svg>
                                        </div>
                                        <div class="contLike col" data-toggle="modal" data-target="#modalAddComentsTopic"
                                        onclick="changeModalAddComent('{{$topic->topic}}',{{$topic->id}})">
                                            <svg class="svgAddComent"    height="20px" viewBox="0 0 512 512.00111" width="20px" xmlns="http://www.w3.org/2000/svg"><path d="m509.925781 495.90625-53.933593-70.164062c-1.679688-2.191407-4.191407-3.585938-6.941407-3.859376-36.589843-3.628906-56.125-11.398437-71.828125-17.644531-13.890625-5.523437-28.25-11.234375-46.78125-11.234375-28.226562 0-49.804687 15.050782-64.441406 32.109375v-.371093c8.152344-18.796876 29.882812-48.457032 63.640625-48.457032 14.523437 0 25.832031 4.5 38.9375 9.710938 10.933594 4.347656 24.542969 9.761718 44.4375 13.941406 5.40625 1.136719 10.707031-2.324219 11.84375-7.730469 1.132813-5.402343-2.328125-10.707031-7.730469-11.839843-18.214844-3.828126-30.402344-8.675782-41.164062-12.957032-13.75-5.46875-27.96875-11.125-46.324219-11.125-35.144531 0-59.878906 23.550782-73.640625 45-13.761719-21.449218-38.496094-45-73.644531-45-18.351563 0-32.574219 5.65625-46.328125 11.128906-15.519532 6.171876-34.835938 13.855469-71.015625 17.441407-5.496094.546875-9.507813 5.441406-8.964844 10.9375.546875 5.496093 5.445313 9.507812 10.941406 8.964843 38.976563-3.867187 60.625-12.476562 76.433594-18.761718 13.097656-5.210938 24.410156-9.710938 38.933594-9.710938 33.761719 0 55.496093 29.664063 63.644531 48.460938v.367187c-14.640625-17.058593-36.214844-32.113281-64.445312-32.113281-18.527344 0-32.890626 5.714844-46.789063 11.242188-15.695313 6.242187-35.226563 14.011718-71.820313 17.640624-2.746093.273438-5.257812 1.667969-6.941406 3.859376l-53.929687 70.164062c-2.324219 3.019531-2.726563 7.097656-1.042969 10.515625 1.683594 3.414063 5.160156 5.578125 8.96875 5.578125h492c3.808594 0 7.285156-2.164062 8.96875-5.578125 1.683594-3.417969 1.28125-7.496094-1.042969-10.515625zm-179.484375-82.90625c14.699219 0 26.140625 4.550781 39.398438 9.824219 15.375 6.117187 36.222656 14.40625 72.910156 18.503906l38.84375 50.535156c-66.832031-1.441406-98.550781-14.058593-119.960938-22.574219-12.425781-4.941406-20.632812-8.207031-31.191406-8.207031-18.480468 0-31.148437 13.871094-36.398437 25.785157-.046875.09375-.09375.1875-.140625.285156l-2.277344 4.847656h-25.625v-29.925781c8.242188-19.023438 30.246094-49.074219 64.441406-49.074219zm-261.191406 28.328125c36.6875-4.097656 57.53125-12.390625 72.917969-18.507813 13.246093-5.269531 24.691406-9.820312 39.386719-9.820312 34.195312 0 56.203124 30.050781 64.445312 49.074219v29.925781h-25.628906l-2.273438-4.847656c-.046875-.097656-.09375-.191406-.140625-.285156-5.253906-11.914063-17.917969-25.785157-36.398437-25.785157-10.558594 0-18.765625 3.265625-31.191406 8.207031-21.410157 8.515626-53.132813 21.132813-119.960938 22.574219zm88.511719 46.542969c11.007812-4.378906 17.070312-6.789063 23.792969-6.789063 8.628906 0 14.046874 6.789063 16.546874 10.917969h-50.921874c3.804687-1.433594 7.304687-2.824219 10.582031-4.128906zm156.136719 4.128906c2.5-4.128906 7.917968-10.917969 16.542968-10.917969 6.726563 0 12.789063 2.410157 23.800782 6.792969 3.273437 1.300781 6.777343 2.691406 10.578124 4.125zm0 0"/><path d="m444.65625 404.722656.363281.035156c.332031.03125.664063.050782.988281.050782 5.085938 0 9.433594-3.859375 9.941407-9.023438.539062-5.496094-3.476563-10.390625-8.972657-10.929687l-.355468-.035157c-5.496094-.546874-10.390625 3.472657-10.933594 8.96875-.542969 5.496094 3.472656 10.390626 8.96875 10.933594zm0 0"/><path d="m222.246094 246.039062c-2.597656.222657-5.023438 1.453126-6.734375 3.449219-1.902344 2.214844-2.738281 5.148438-2.296875 8.03125 4.144531 26.996094 18.511718 45.441407 39.488281 51.765625-.480469 3.78125-.925781 7.566406-1.324219 11.363282l-5.324218 50.777343c-.574219 5.492188 3.410156 10.414063 8.902343 10.988281.355469.039063.707031.054688 1.054688.054688 5.054687 0 9.394531-3.816406 9.933593-8.957031l5.324219-50.777344c.386719-3.691406.820313-7.367187 1.28125-11.035156 46.515625-.574219 74.914063-30.234375 89.128907-92.949219 1.582031-6.976562 3.5-15.101562 5.707031-24.152344.699219-2.867187.097656-5.894531-1.648438-8.277344-.648437-.882812-1.429687-1.644531-2.304687-2.261718l3.933594-2.25c2.363281-1.347656 4.074218-3.605469 4.734374-6.246094 17.472657-69.53125 43.050782-161.964844 43.308594-162.890625.863282-3.109375.171875-6.441406-1.855468-8.949219-2.023438-2.511718-5.148438-3.898437-8.355469-3.7031248-3.386719.1914068-83.722657 5.9960938-149.757813 113.4296878-.820312 1.332031-1.617187 2.652343-2.40625 3.976562-1.214844 2.023438-1.671875 4.414063-1.296875 6.742188l5.007813 30.832031h-16.980469c-4.007813 0-7.625 2.390625-9.199219 6.074219-10.707031 25.089843-16.859375 48.640625-18.289062 70.007812-.191406 2.839844.839844 5.628907 2.832031 7.664063zm131.5-79.480468-26.707032 15.261718c-3.828124 2.1875-5.773437 6.625-4.785156 10.921876.988282 4.296874 4.675782 7.441406 9.074219 7.738281l13.847656.929687c-1.101562 4.640625-2.105469 8.957032-3.003906 12.917969-14.433594 63.6875-41.089844 76.261719-66.691406 77.324219 14.671875-88.472656 51.800781-170.632813 108.609375-240.253906-8.726563 32.1875-20.636719 76.726562-30.34375 115.160156zm-107.296875 8.445312h22.050781c2.929688 0 5.714844-1.289062 7.617188-3.523437 1.898437-2.234375 2.722656-5.1875 2.253906-8.082031l-6.300782-38.808594c.132813-.222656.269532-.441406.40625-.664063 31.527344-51.292969 66.285157-76.820312 89.890626-89.203125 5.589843-2.933594 10.832031-5.28125 15.617187-7.171875-34.410156 39.953125-62.644531 84.613281-83.964844 132.898438-18.199219 41.210937-31.058593 84.367187-38.382812 128.671875-10.890625-4.460938-16.730469-14.007813-19.863281-23.121094h10.226562c4.027344 0 7.660156-2.414062 9.21875-6.125 1.558594-3.707031.742188-7.992188-2.074219-10.871094l-20.546875-20.984375c1.617188-16.25 6.265625-34.039062 13.851563-53.015625zm0 0"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                </div>
            </div>
        </div>
    </div>

    <!-- modalListComents -->
<div class="modal fade" id="modalListComents{{$topic->id}}" tabindex="-1" role="dialog" aria-labelledby="modalListComents{{$topic->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloListComents">{{$topic->topic}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @include('layouts.common.listComents')
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>


@endforeach

<div class="modal fade" id="modalAddComentsTopic" tabindex="-1" role="dialog" aria-labelledby="modalAddComentsTopic" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloAddComentsG">Comentar Tema: </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container addComent">
    <form method="POST" action="{{route('coments.store')}}" aria-label="" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container py-2 px-0">
            <div class="row mt-2 mb-0">
                <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0 
                            d-none d-sm-block">
                    <div id="divImgComent">
                        <div id="imgComent" style="background-image: url({{ Auth::User()->imgProf}});">
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-11 col-md-11 col-lg-11 col-xl-11">
                    <input id="input_topics_id" type="hidden" name="topics_id" value="">
                    <textarea class="form-control" maxlength="200" placeholder="Comentario"
                              name="coment"></textarea>
                    <input id="inputImgNewCG" type="file" name="inputImgNewComent[]" 
                            class="form-control" 
                            accept="image/x-png,image/jpeg"
                            value=""
                            multiple="multiple">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-1 col-lg-1 col-xl-1 pl-3 pr-0"></div>
                <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-11">
                    <div class="col mt-0 showPreviewImg" id="previewImgNewCG">
                    </div>
                </div>
            </div>
            <div class="row mb-1 mt-0">
                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div id="svgAddComentImg">
                                    <svg height="25pt" 
                                        width="25pt" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 58 58" style="enable-background:new 0 0 1 1;" xml:space="preserve" >
                                    <g> <path d="M57,6H1C0.448,6,0,6.447,0,7v44c0,0.553,0.448,1,1,1h56c0.552,0,1-0.447,1-1V7C58,6.447,57.552,6,57,6z M56,50H2V8h54V50z" /><path d="M16,28.138c3.071,0,5.569-2.498,5.569-5.568C21.569,19.498,19.071,17,16,17s-5.569,2.498-5.569,5.569
                                            C10.431,25.64,12.929,28.138,16,28.138z M16,19c1.968,0,3.569,1.602,3.569,3.569S17.968,26.138,16,26.138s-3.569-1.601-3.569-3.568
                                            S14.032,19,16,19z"/><path d="M7,46c0.234,0,0.47-0.082,0.66-0.249l16.313-14.362l10.302,10.301c0.391,0.391,1.023,0.391,1.414,0s0.391-1.023,0-1.414
                                            l-4.807-4.807l9.181-10.054l11.261,10.323c0.407,0.373,1.04,0.345,1.413-0.062c0.373-0.407,0.346-1.04-0.062-1.413l-12-11
                                            c-0.196-0.179-0.457-0.268-0.72-0.262c-0.265,0.012-0.515,0.129-0.694,0.325l-9.794,10.727l-4.743-4.743
                                            c-0.374-0.373-0.972-0.392-1.368-0.044L6.339,44.249c-0.415,0.365-0.455,0.997-0.09,1.412C6.447,45.886,6.723,46,7,46z"/></g></svg>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <button type="submit" class="btn btn-info">Comentar</button>
                </div>
            </div>
        </div>
    </form>
</div>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('aside-left')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 aside-left">
            <div id="detailProfile" class="withBorder">
                <div id="imgPort" 
                    onclick="location.href = '{{route('profile')}}';"
                    style="background-image: url({{ Auth::User()->imgPort}});">
                </div>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-4">
                            <div id="imgProf" 
                                    onclick="location.href = '{{route('profile')}}';"
                                    style="background-image: url({{ Auth::User()->imgProf}});">
                            </div>
                        </div>
                        <div class="col-8">
                            <div>
                                <strong>{{Auth::user()->name}}</strong><br>
                                <em>{{Auth::user()->email}}</em>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="colDetailTitle">
                                Comentarios
                            </div>
                            <div class="colDetailText">
                                {{Auth::User()->coments->count()}}
                            </div>
                        </div>
                        <div class="col">
                            <div class="colDetailTitle">
                               Siguiendo 
                            </div>
                            <div class="colDetailText">
                                0
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('aside-rigth')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @include('layouts.common.right')
        </div>
    </div>
</div>
@endsection
