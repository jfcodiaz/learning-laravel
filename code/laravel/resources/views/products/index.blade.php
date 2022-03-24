@extends('template')

@section('content')
    <h2>Products</h2>

    <a href="{{ route('products.create') }}">Nuevo</a>
    <div class="row">
        <div class="offset-2 col-sm-8">
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Descriptions</th>
                    @can('destroy_product')
                        <th>&nbsp;</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{ route('products.show', ['product' => $product]) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->description }}</td>
                        @can('destroy_product')
                            <td>
                                <form action="{{ route('products.destroy',  ['product' => $product]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        @endcan
                    </tr>
                @empty
                    <tr>
                        <th colspan="4" class="text-center">
                            <h1>No hay productos, crea uno nuevo</h1>
                        </th>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
