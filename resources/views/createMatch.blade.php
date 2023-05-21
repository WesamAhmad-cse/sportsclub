@extends('layout')
@section('title', 'Create Match')
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


        .form-container {
            min-height: 100vh;
            min-width: 200vh;
            background-color: ;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            border: #3498db
        }

        .form-container form {
            padding: 20px;
            background-color: #fdfcfc;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            text-align: center;
            width: 500px;
            border-radius: 5px;
        }

        .form-container form h3 {
            margin-bottom: 10px;
            font-size: 30px;
            text-transform: uppercase;
        }

        .form-container form .box {
            width: 100%;
            border-radius: 5px;
            padding: 12px 14px;
            font-size: 18px;
            color: #333;
            margin: 10px 0;
            background-color: #eee;
            border: 1px solid #3498db;
        }
    </style>


    <div class="form-container">
        <form action="{{ route('createMatchPost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Create Match</h3>
            <input type="text" name="name" placeholder="enter match name" class="box" required>
            <input type="text" name="city" placeholder="enter city" class="box" required>
            <input type="date" name="date" placeholder="enter the Date of the match" class="box" required>
            <input type="time" name="time" placeholder="enter the Time of the match" class="box" required>
            <input type="submit" name="submit" value="Create" class="button">
        </form>

    </div>
@endsection
