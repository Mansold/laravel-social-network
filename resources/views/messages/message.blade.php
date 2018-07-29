<div class="card">
    <img class="card-img-top" src="{{ $message->image }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">{{ $message->title }}</h5>
        <p class="card-text"> {{ substr(strip_tags($message->content), 0, 50) }}
        @if(strlen(strip_tags($message->content)) > 50)
            <a href="/messages/{{ $message->id }}">Leer más...</a>
        @endif
        </p>
    </div>
    <div class="card-footer">
        <small class="text-muted">
            <a href="{{ $message->user->username }}">{{ $message->user->username }}</a>
             - {{ $message->created_at }}
        </small>
    </div>
</div>