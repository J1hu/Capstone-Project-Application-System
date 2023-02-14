<!-- Testing View -->
<h1>List of Users</h1>

<ul>
    @foreach ($users as $user)
    <li>{{ $user->name }}</li>
    @endforeach
</ul>