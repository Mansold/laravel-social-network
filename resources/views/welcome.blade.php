@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Laravel Social Network</h1>
</div>

<div class="container">
    <div class="row justify-content-md-center">
        @if(count($messages) < 1)
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Sorry!</h4>
                    <p class="mb-0">No hay mensajes destacados. Te recomendamos crear alguno en la BBDD.</p>
                </div>
            </div>
        @endif
    </div>

    <form action="/messages/create" method="post">
        {{ csrf_field() }}
        {{--  @csrf --}}
        <div class="form-group @if($errors->has('title')) is-invalid @endif">
            <input type="text" name="title" class="form-control 
                @if($errors->has('title')) is-invalid @endif" 
                placeholder="Titulo...">
            @if ($errors->any())
                @foreach($errors->get('title') as $error)
                    <div class="invalid-feedback">{{ $error }}</div>
                @endforeach
            @endif
        </div>
        <div class="input-group @if($errors->has('content')) is-invalid @endif">
            <div class="input-group-prepend">
                <span class="input-group-text">Post:</span>
            </div>
            <textarea name="content" class="form-control @if($errors->has('content')) is-invalid @endif"
                aria-label="With textarea" placeholder="¿Qué estas pensando?"></textarea>
            @if ($errors->any())
                @foreach($errors->get('content') as $error)
                    <div class="invalid-feedback">{{ $error }}</div>
                @endforeach
            @endif
        </div>
    </form>
    <br>

    <div class="card-deck">
        @foreach($messages as $message)
            <div class="col-4 mb-3">
                @include('messages.message')
            </div>
        @endforeach
    </div>

    @if(count($messages))
        <div class="pagination justify-content-center">
            {{ $messages }}
        </div>
    @endif
    
</div>
</div>
@endsection
