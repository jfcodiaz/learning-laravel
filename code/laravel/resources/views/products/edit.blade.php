@extends('template')

@section('content')
    <h2>Edicion del Producto</h2>
    <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
        @csrf
        @method('PUT')
        @include('products._form-inputs')
    </form>
@endsection
