@props([
    'action' => '#',
])

<form action="{{ $action }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
</form>
