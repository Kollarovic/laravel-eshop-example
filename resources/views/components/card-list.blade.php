@props([
    'title' => 'Untitled',
    'createLabel' => 'Create',
    'createLink' => null,
    'model' => null,
])

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>

        @if($createLink)
            <div class="card-tools">
                <a href="{{ $createLink }}" class="btn btn-primary btn-sm mr-1">
                    <i class="fas fa-plus"></i> {{ $createLabel }}
                </a>
            </div>
        @endif
    </div>

    <div class="card-body p-0">
        {{ $slot }}
    </div>

    @if($model)
        <div class="card-footer clearfix pb-0">
            {{ $model->links() }}
        </div>
    @endif
</div>
