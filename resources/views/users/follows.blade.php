@extends('layouts.app')

@section('content')

<h1>{{ $user->name }}</h1>
<ul class="list-unstile">
@foreach($follows as $follow)
    <li>{{ $follow->username }}</li>
@endforeach
</ul>

@endsection