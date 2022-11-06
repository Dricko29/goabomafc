<td>
    @foreach ($model as $user)
    <span>{{ $user->roles->name }}</span>
    @endforeach
</td>