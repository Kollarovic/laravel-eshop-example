@props([
    'items' => [],
    'colors' => ['primary', 'success', 'warning', 'danger', 'info', 'secondary', 'teal', 'maroon', 'dark'],
 ])
<div class="row">
    @foreach ($items as $item)
        @if($item->isActive() && !$item->isCurrent())
            <div class="col-lg-3 col-6">
                <div class="small-box bg-{{ $colors[$loop->index % count($colors)] }}">
                    <div class="inner">
                        <h3>{{ $item->getValue() }}&nbsp;</h3>
                        <p>{{ __($item->getLabel()) }}</p>
                    </div>
                    <div class="icon">
                        <i class="{{ $item->getIcon() }}"></i>
                    </div>
                    <a href="{{ route($item->getRoute()) }}" class="small-box-footer">
                        Show
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endif
    @endforeach
</div>

