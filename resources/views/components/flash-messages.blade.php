@foreach (['success', 'danger' => 'error', 'warning', 'info'] as $class => $type)
    @if(session($type))
        <div class="alert alert-{{ is_string($class) ? $class : $type }} alert-dismissible fade show" role="alert">
            {{ session($type) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endforeach
