@extends('layouts.app')

@section('content')
    <div class="main-banner">
        <h1>Welcome to Our E-Shop</h1>
        <p>Discover amazing products at great prices!</p>
    </div>

    <div class="product-list">
        <h2>Featured Products</h2>
        <div class="products">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->price }}</p>
                    <button>Add to Cart</button>
                </div>
            @endforeach
        </div>
    </div>
@endsection
