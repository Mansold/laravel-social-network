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
<div class="row">
    @forelse($messages as $message)
        <div class="col-6">
            <img class="img-thumbnail" src="{{$message['image']}}">
            <p class="card-text">
                {{$message['content']}}
                <a href="/messages/{{$message['id']}}">Leer más...</a>
            </p>
        </div>
    @empty
        <div class="col-12">
            <p>No hay mensajes destacados.</p>
        </div>
    @endforelse
</div>
@endsection
