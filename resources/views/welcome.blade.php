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
        <form action="/messages/create" method="post">
            {{ csrf_field() }}
            {{--  @csrf --}}
            <div class="form-group @if($errors->has('message')) has-danger @endif">
                <input type="text" name="message" class="form-control" placeholder="¿Qué estas pensando?">
                @if ($errors->any())
                    @foreach($errors->get('message') as $error)
                        <div class"form-control-feedback">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </form>
    </div>

<div class="row">
    <div class="card-deck">
        @forelse($messages as $message)
            <div class="col-4 mb-3">
                <div class="card">
                    <img class="card-img-top" src="{{ $message->image }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">{{ $message->content }}</p>
                        <a href="/messages/{{ $message->id }}">Leer más...</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-auto">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Sorry!</h4>
                    <p class="mb-0">No hay mensajes destacados. Te recomendamos crear alguno en la BBDD.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
</div>
@endsection
