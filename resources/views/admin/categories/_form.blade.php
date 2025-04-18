<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name ?? '') }}" required>
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group form-check">
    <input type="hidden" name="active" value="0">
    <input type="checkbox" name="active" class="form-check-input @error('active') is-invalid @enderror" id="active" value="1" {{ old('active', $category->active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Active</label>
    @error('active')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
