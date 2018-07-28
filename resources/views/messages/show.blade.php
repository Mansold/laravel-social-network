@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="{{ $message->image }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $message->title }}</h5>
                    <p class="card-text">{{ $message->content }}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $message->updated_at }}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection