@props(['items' => []])
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
    @foreach ($items as $item)
        @if($item->isActive())
            <li class="nav-item">
                <a href="{{ route($item->getRoute()) }}" class="nav-link @if($item->isCurrent() || $item->isOpen()) active @endif">
                    <i class="nav-icon {{ $item->getIcon() }}"></i>
                    <p>
                        {{ $item->getLabel() }}
                    </p>
                </a>
            </li>
        @endif
    @endforeach
</ul>
