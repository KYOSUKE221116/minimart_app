@extends('layouts.app')

@section('title', 'New Product')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="col h3">New Product</h1>
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label small fw-bold">Name</label>
                <input type="text" name="name" id="name" class="form-control" requierd autofocus>
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label small fw-bold">Description</label>
                <textarea name="description" id="description" rows="5" class="form-control" autofocus></textarea>
                @error('description')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label small fw-bold">Price</label>
                <div class="input-group">
                    <div class="input-group-text">$</div>
                    <input type="number" name="price" id="price" class="form-control" step="any" required>
                </div>
                @error('price')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="section" class="form-label small fw-bold">Section</label>
                <select name="section" id="section" class="form-select">
                    <option hidden>Select Section</option>
                    
                    @foreach ($all_sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach

                </select> 
                <a href="{{ route('section.index') }}" class="">Add a new section</a>
            </div>
            <a href="{{ route('product.index') }}" class="btn btn-outline-success">Cancel</a>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i>Add</button>
        </form>
    </div>
</div>
    
@endsection