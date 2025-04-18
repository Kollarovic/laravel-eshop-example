@foreach (['success' => 'green', 'error' => 'red', 'warning' => 'yellow', 'info' => 'blue'] as $type => $color)
    @if(session($type))
        <div class="mb-4 p-4 rounded bg-{{ $color }}-100 text-{{ $color }}-800 border border-{{ $color }}-300">
            {{ session($type) }}
        </div>
    @endif
@endforeach
