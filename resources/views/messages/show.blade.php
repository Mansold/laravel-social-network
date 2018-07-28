@extends('layouts.app')

@section('content')
<div class="title m-b-md">
    <h1 class="h3">Mensaje: {{ $message->id }}</h1>
    <img class="img-thumbnail" src="{{ $message->image }}" alt="">
    <p class="card-text">
        {{ $message->content }}
        <small class="text-muted">{{ $message->created_at }}</small>
    </p>
</div>
@endsection