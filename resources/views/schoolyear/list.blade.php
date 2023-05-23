<x-app-layout>
    <h1>School Years List</h1>
    <div class="text-right">
        <a href="{{ route('school-years.create') }}" class="px-5 justify-self-end content-center hover:bg-blue-500 bg-blue-700 py-2 border-2 w-fit rounded-md border-slate-300 text-white uppercase text-xs font-bold focus:bg-blue-900 focus:ring-blue-500 active:bg-blue-800">Create School Year</a>
    </div>
    <ul>
        @foreach($schoolYears as $year)
        @if ($year->is_archived == true)
        <li><a href="{{ route('school-years.batches', $year->id) }}">
                <p class="text-rose-500">{{ $year->year }}</p>
            </a></li>
        @else
        <li><a href="{{ route('school-years.batches', $year->id) }}">
                <p>{{ $year->year }}</p>
            </a></li>
        @endif
        @endforeach
    </ul>
</x-app-layout>