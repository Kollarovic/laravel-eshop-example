@props([
    'title' => 'Untitled',
    'action' => '#',
    'method' => 'POST',
    'submit' => 'Save',
    'collapsible' => true,
])

@php
    $method = strtoupper($method);
@endphp

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
        @if($collapsible)
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        @endif
    </div>

    <form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" enctype="multipart/form-data">
        <div class="card-body">
            @csrf
            @if(!in_array($method, ['GET', 'POST'], true))
                @method($method)
            @endif

            {{ $slot }}

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ $submit }}</button>
        </div>
    </form>
</div>
