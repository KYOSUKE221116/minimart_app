@extends('layouts.app')

@section('title', 'Edit Product')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="col h3">Edit Product</h1>
        <form action="{{ route('product.update', $product->id ) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label small fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" requierd autofocus>
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label small fw-bold">Description</label>
                <textarea name="description" id="description" rows="5" class="form-control" autofocus>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label small fw-bold">Price</label>
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="number" name="price" id="price" class="form-control" step="any" value="{{ old('price', $product->price) }}" required>
                </div>
                @error('price')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="section" class="form-label small fw-bold">Section</label>
                <select name="section" id="section" class="form-select">
                    
                    @foreach ($all_sections as $section)
                        <option value="{{ old('section', $product->section->id) }}">{{ $section->name }}</option>
                    @endforeach

                </select> 
            </div>
            <a href="{{ route('product.index') }}" class="btn btn-outline-secondary">Cancel</a>
            <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-check"></i></i>Save Changes</button>
        </form>
    </div>
</div>
    
@endsection