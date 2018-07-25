@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Laravel Social Network</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">Acerca</a>
            </li>
        </ul>
    </nav>
</div>
<div class="container">
<div class="row">
    <div class="card-deck">
        @forelse($messages as $message)
            <div class="col-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{$message['image']}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">{{$message['content']}}</p>
                        <a href="/messages/{{$message['id']}}">Leer más...</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No hay mensajes destacados.</p>
            </div>
        @endforelse
    </div>
</div>
</div>
@endsection
