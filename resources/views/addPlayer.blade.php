@extends('layout')
@section('title', 'Add Player')
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

        select {

            width: 100%;

            border: 1px solid var(--select-border);
            border-radius: 0.25em;
            border: 1px solid #3498db;
            padding: 0.25em 0.5em;
            font-size: 1.25rem;
            line-height: 1.1;
            background-color: #fff;
            text-align: center;
            padding-top: 15px;

        }

        select>option {
            font-size: 18px;
            font-family: 'Open Sans', sans-serif;
            color: #2980b9;

            background-color: rgb(247, 247, 247);
            background-image: none;
            font-size: 18px;
            height: 50px;
            padding: 15px;
            border: 1px solid rgb(15, 7, 7);

        }
    </style>

    <div class="form-container">
        <form action="{{ route('addPlayerPost') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Add a Player</h3>
            <input type="text" name="first_name" placeholder="enter First name" class="box" required><br><br>
            <input type="text" name="last_name" placeholder="enter Latst name" class="box" required><br><br>
            <input type="email" name="email" placeholder="enter email" class="box" required><br><br>
            <input type="password" name="password" placeholder="enter password" class="box" required><br><br>
            <select name='role_id'>
                <option value="1">trainer</option>
                <option value="2">player</option>
            </select><br><br>
            <input type="submit" name="submit" value="Add The Player" class="button">
        </form>

    </div>

@endsection
