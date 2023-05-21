@extends('layout')
@section('title', 'TrainerHome')
@section('content')

    <style>
        .button {
            background-color: #6563dd;
            color: #ffffff;
            width: 100%;
            border-radius: 5px;
            padding: 10px 30px;
            display: block;
            text-align: center;
            cursor: pointer;
            font-size: 20px;
            margin-top: 10px;
        }

        /* body {
                                                                                                                                                                                                            min-height: 100vh;
                                                                                                                                                                                                            background-image: url('img/ws.jpg');
                                                                                                                                                                                                            background-size: cover;
                                                                                                                                                                                                            background-position: center;
                                                                                                                                                                                                        } */

        .form-container {
            min-height: 100vh;
            background-color: ;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .form-container form {
            padding: 20px;
            background-color: #fdfcfc;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            text-align: center;
            width: 500px;
            border-radius: 5px;
        }

        .form-container form h2 {
            margin-bottom: 10px;
            font-size: 30px;
            text-transform: uppercase;
        }
    </style>

    {{-- <div class="data"> <b> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</b></div>
            <br><br> --}}
    <div class="form-container">

        @csrf
        <form action="{{ route('trainerHome') }}" method="get" enctype="multipart/form-data">


            <h2> hello in sports club</h2>
            {{-- <form action="" class="btn">
                <input type="submit">
            </form> --}}

            <br>
            <a class="button" href="{{ route('addPlayer') }}"> Add Player!</a>
            <br>
            <a class="button" href="{{ route('createMatch') }}"> Create Match!</a>
            <br>



            <a class="button" href="{{ route('assignPlayer') }}">assign Player To Match! </a>

            <br>

            <a class="button" href="{{ route('delete') }}"> Delete Player!</a>
            <br>

            {{-- <form action="http://127.0.0.1:8000/trainer/home/deletePlayer">
                <button type="submit" class="button">delete</button>
            </form> --}}


        </form>

    </div>



@endsection
