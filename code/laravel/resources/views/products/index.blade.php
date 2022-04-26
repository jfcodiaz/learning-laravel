<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('products.create') }}" class="underline" title="Nuevo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </a>
                    <table class="table-auto">
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
                                            <input type="submit" value="Delete">
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
        </div>
    </div>
</x-app-layout>

{{--
@extends('template')

@section('content')
    <h2>Products</h2>

    <a href="{{ route('products.create') }}">Nuevo</a>
    <div class="row">
        <div class="offset-2 col-sm-8">

        </div>
    </div>

@endsection

--}}
