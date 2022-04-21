

<div class="mb-3">
    <label for="input-name" class="form-label">{{ __('products/form.name') }}</label>
    <input type="text"
        name="name"
        placeholder="{{ __('products/form.name') }}"
        value="{{ old('name', $product->name) }}"
        class="form-control"
        id="input-name"
    >
</div>
<div class="mb-3">
    <label for="input-name" class="form-label">{{ __('products/form.description') }}</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
</div>
<div class="mb-3">
    <div>Categorias:</div>
    <div>
        @foreach($categories as $category)
            <label>{{$category->name}}
                <input type="checkbox"
                    {{$product->categories->contains($category) ? 'checked' : '' }}
                    name="categories[]"
                    value="{{ $category->id }}"
                >
            </label>
        @endforeach
    </div>
</div>
<div class="mb-3">
    <input type="submit" value="{{ $callAction }}" class="btn btn-primary">
</div>
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
