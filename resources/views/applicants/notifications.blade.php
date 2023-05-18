<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl mb-5 text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>
    @if ($notifications->isEmpty())
    <div class="card bg-white py-5 px-5 border-l-4 border-blue-500 rounded-sm">
        <p>No notifications found.</p>
    </div>
    @else
    @foreach ($notifications as $notification)
    @if (is_null($notification->read_at))
    <div class="card bg-white py-5 px-5 rounded-sm">
        <div class="flex">
            <div class="w-3 h-3 bg-blue-500 rounded-full align-middle mt-2 mr-2"></div>
            <div class="card-body">
                <h4 class="font-extrabold">{{ $notification->data['title'] }}</h4>
                <p class="font-semibold">{!! $notification->data['content'] !!}</p>
                <form action="{{ route('notifications.mark-as-read', $notification->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary mt-3 font-semibold text-blue-500">Mark as Read</button>
                </form>
            </div>
        </div>
        <hr class="w-full bg-slate-500 mt-5">
    </div>
    @elseif ($notification->read_at)
    <div class="card bg-white py-5 px-5 rounded-sm grid">
        <div class="card-body pl-2">
            <h4 class="font-semibold">{{ $notification->data['title'] }}</h4>
            <p class="text-slate-400">{!! $notification->data['content'] !!}</p>
        </div>
        <hr class="w-full bg-slate-500 mt-5">
    </div>
    @endif
    @endforeach
    @endif
</x-app-layout>