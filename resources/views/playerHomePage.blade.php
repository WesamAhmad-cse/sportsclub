@extends('layout')
@section('title', 'player Home')
@section('content')
    <style>
        .data {
            margin: 10px 0;
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            text-align: center;

            font-size: 20px;
        }
    </style>

    <div class="form-container">
        @csrf
        {{-- <form action="{{ route('playerHome') }}" method="post" enctype="multipart/form-data">

            @foreach ($matches as $match)
                <div class="data"> <b>the matches that you are assigned in : {{ Auth::match()->name }} </b></div>
                <div class="data"> <b> {{ Auth::match()->city }}</b></div>
                <div class="data"> <b> {{ Auth::match()->date }}</b></div>
                <div class="data"> <b>{{ Auth::match()->time }}</b> </div>
            @endforeach --}}

        </form>
    </div>
@endsection
