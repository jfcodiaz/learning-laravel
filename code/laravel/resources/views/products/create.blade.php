<x-test-layout>
    <h2>{{ __('products.form.new-product') }}}</h2>
    <form action="" method="POST">
        @csrf
        @include('products._form-inputs')
    </form>
</x-test-layout>
