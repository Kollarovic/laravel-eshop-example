<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name ?? '') }}">
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="image" class="form-control-file @error('image') is-invalid @enderror">
    @error('image')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="price">Price (€)</label>
    <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price ?? '') }}">
    @error('price')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="unit">Unit</label>
    <input type="text" name="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit', $product->unit ?? '') }}">
    @error('unit')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="vat">VAT (%)</label>
    <select name="vat" class="form-control @error('vat') is-invalid @enderror">
        @foreach([0, 10, 20] as $rate)
            <option value="{{ $rate }}" {{ old('vat', $product->vat ?? 20) == $rate ? 'selected' : '' }}>{{ $rate }}%</option>
        @endforeach
    </select>
    @error('vat')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group form-check">
    <input type="hidden" name="active" value="0">
    <input type="checkbox" name="active" class="form-check-input @error('active') is-invalid @enderror" id="active" value="1" {{ old('active', $product->active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Active</label>
    @error('active')
    <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
