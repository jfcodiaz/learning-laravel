@extends('template')

@section('content')

    <h1>{{ $product->name }}<h1>
    <div>{{ $product->description }}</div>
    <div> <a href="{{ route('products.edit', ['product' => $product]) }}">Edit</a></div>
@endsection
