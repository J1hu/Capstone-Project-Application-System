<x-app-layout>
    <div class="container">
        <h2>Notifications</h2>
        @forelse ($notifications as $notification)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Exam Date: {{ $notification->data['exam_date'] }}</h5>
                <p class="card-text">Content: {{ $notification->data['content'] }}</p>
                <form action="{{ route('notifications.mark-as-read', $notification->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Mark as Read</button>
                </form>
            </div>
        </div>
        @empty
        <p>No notifications found.</p>
        @endforelse
    </div>
</x-app-layout>