@extends('master')

@section('content')
    <div class="container-fluid">
        @guest
            @include('guest')
        @else
            @include('user')
        @endguest
    </div>
@stop
