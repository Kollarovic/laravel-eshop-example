@props(['image' => null])

@if($image)
    <img src="{{ asset('storage/' . $image) }}" alt="" style="max-height: 60px;">
@else
    <span class="text-muted">No image</span>
@endif
