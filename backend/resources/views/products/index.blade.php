@extends('layouts.app')

@section('title', 'Product')
    
@section('content')
    <div class="row">
        <h1 class="col h3">Products</h1>
        <a href="{{ route('product.create') }}" class="col-2 btn btn-success text-center"><i class="fa-solid fa-circle-plus"></i> New Product</a>
    </div>
    <table class="table table-hover align-middle mt-5">
        <thead class="bg-success">
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>SECTION</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($all_products->isNotEmpty())
                @foreach ($all_products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->section->name }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-secondary btn-sm">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" title="Delete" data-bs-toggle="modal" data-bs-target="#delete-post-{{ $product->id }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            @include('products.modal.delete')
                        </td>
                    </tr>  
                @endforeach
            @endif
        </tbody>
    </table>
@endsection