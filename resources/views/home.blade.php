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
                    style="background-image: url({{asset('img/zapatos.jpg')}});">
                </div>
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-4">
                            <div id="imgProf" 
                                    onclick="location.href = '{{route('profile')}}';"
                                    style="background-image: url({{asset('img/im.png')}});">
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
                                Tweets
                            </div>
                            <div class="colDetailText">
                                1
                            </div>
                        </div>
                        <div class="col">
                            <div class="colDetailTitle">
                               Siguiendo 
                            </div>
                            <div class="colDetailText">
                                1
                            </div>
                        </div>
                        <div class="col">
                            <div class="colDetailTitle">
                                Seguidores
                            </div>
                            <div class="colDetailText">
                                1
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
            rigth
        </div>
    </div>
</div>
@endsection
