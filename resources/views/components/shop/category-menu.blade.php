<div>
    <ul class="space-y-2">
        @foreach($categories as $category)
            @php
                $isActive = request()->routeIs('shop.category.show', $category) &&
                            request()->route('category')?->id === $category->id;
            @endphp
            <li>
                <a href="{{ route('shop.category.show', $category) }}" class="text-blue-600 hover:underline {{ $isActive ? 'font-bold underline' : '' }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

