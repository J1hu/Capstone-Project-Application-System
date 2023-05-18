<x-app-layout>
    <h2>Notifications</h2>
    @foreach ($notifications as $notification)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Title: {{ $notification->data['title'] }}</h5>
            <p>Content:</p> {!! $notification->data['content'] !!}
            <form action="{{ route('notifications.mark-as-read', $notification->id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Mark as Read</button>
            </form>
        </div>
    </div>
    @empty
    <p>No notifications found.</p>
    @endforeach
</x-app-layout>