@props(['items' => []])
<ol class="breadcrumb float-sm-right">
    @foreach ($items as $item)
        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
            @if (!$loop->last)
                <a href="{{ route($item->getRoute()) }}">
                    {{ __($item->getLabel()) }}
                </a>
            @else
                {{ __($item->getLabel()) }}
            @endif
        </li>
    @endforeach
</ol>
