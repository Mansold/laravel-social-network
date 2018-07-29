@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $user->name }}</h1>

            {{-- Follow/unfollow form --}}
            @if(Auth::check())
                @if(!Auth::user()->isFollowing($user))
                    <form action="/{{ $user->username }}/follow" method="post">
                        {{ csrf_field() }}
                        @if(session('success'))
                            <span class="alert alert-warning">{{session('success')}}</span>
                        @endif

                        <button class="btn btn-primary">Follow</button>
                    </form>
                @else
                    <form action="/{{ $user->username }}/unfollow" method="post">
                        {{ csrf_field() }}
                        @if(session('success'))
                            <span class="alert alert-primary">{{session('success')}}</span>
                        @endif
                        
                        <button class="btn btn-danger">Unfollow</button>
                    </form>
                @endif
            @endif

        </div>
        <div class="card-footer">
            <a class="btn btn-secondary" href="/{{ $user->username }}/follows">
                Siguiendo: <span class="badge badge-pill badge-success">{{ $user->follows->count() }}</span>
            </a>
            <a class="btn btn-secondary" href="/{{ $user->username }}/followers">
                Seguidores: <span class="badge badge-pill badge-info">{{ $user->followers->count() }}</span>
            </a>
        </div>
    </div>
    <br>
    
    {{-- User->Messages --}}
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