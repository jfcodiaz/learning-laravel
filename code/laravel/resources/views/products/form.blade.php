@extends('template')

@section('content')
    {{--
        <style>
            .container{
                padding-top: 150px;
            }
            .container .row > div {
                border: solid 1px black;
            }
        </style>

    <div class="container">


        <div class="row">
            <div class="col-12  col-sm-6 col-md-3 col-lg-3 col-xl-2">
                1 of 2
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                2 of 2
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                3 of 2
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-2">
                4 of 2
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2">
                5 of 2
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2">
                6 of 2
            </div>
            <div class="col-12 col-sm-6 col-md col-lg-3" >
                7 of 2
            </div>
            <div class="col-12 col-sm-6 col-md col-lg-3">
                8 of 2
            </div>
            <div class="col-12 col-sm-3 col-md col-lg-3 col-xl-6">
                9 of 2
            </div>

            <div class="col-12 col-sm-3 col-md col-lg-3 col-xl-6">
                10 of 2
            </div>

            <div class="col-6 col-sm-3 col-md col-lg-3">
                11 of 2
            </div>

            <div class="col-6 col-sm-3 col-md col-lg-3 ">
                12 of 2
            </div>
        </div>

        <div class="row d-none d-md-block">
            <div class="col ">
                1 of 3
            </div>
            <div class="col">
                2 of 3
            </div>
            <div class="col">
                3 of 3
            </div>
        </div>


    </div>
--}}
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <h2>{{ $title }}</h2>
            <form action="{{ $route }}" method="POST">
                @csrf
                @if( isset($method) && ($method === 'PUT'))
                    @method('PUT')
                @endif
                @include('products._form-inputs')
            </form>
        </div>
    </div>

@endsection
