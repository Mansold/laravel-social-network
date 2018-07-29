@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-deck">
        <h1>{{ $user->name }}</h1>
        </div>
    </div>

    @if(Auth::check())
    <div class="row">
        @if(!Auth::user()->isFollowing($user))
            <form action="/{{ $user->username }}/follow" method="post">
                {{ csrf_field() }}
                @if(session('success'))
                    <span class="">{{session('success')}}</span>
                @endif

                <button class="btn btn-primary">Follow</button>
            </form>
        @else
            <form action="/{{ $user->username }}/unfollow" method="post">
                {{ csrf_field() }}
                @if(session('success'))
                    <span class="">{{session('success')}}</span>
                @endif
                
                <button class="btn btn-primary">Unfollow</button>
            </form>
        @endif
    </div>
    @endif

    <div class="row">
        @forelse($messages as $message)
            <div class="col-6 mb-3">
                @include('messages.message')
            </div>
        @empty
            <div class="col">
                <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading">Sorry!</h4>
                    <p class="mb-0">No hay mensajes destacados. Te recomendamos crear alguno en la BBDD.</p>
                </div>
            </div>
        @endforelse

        @if(count($messages))
            <div class="pagination justify-content-center">
                {{ $messages }}
            </div>
        @endif
    </div>
</div>
@endsection