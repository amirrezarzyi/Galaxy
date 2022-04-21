@foreach ($user->roles as $userRole)
    <span class="badge rounded-pill badge-light-primary me-1">{{ $userRole->name }}</span>
@endforeach
