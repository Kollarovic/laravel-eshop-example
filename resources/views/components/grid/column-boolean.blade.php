@props(['value' => false])

@if($value)
    <span class="badge badge-success">Yes</span>
@else
    <span class="badge badge-secondary">No</span>
@endif
