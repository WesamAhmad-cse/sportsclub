@extends('layout')
@section('title', 'Create Match')
@section('content')
<form action="{{ route('createMatch') }}" method="post" enctype="multipart/form-data">
    @csrf
    <h3>Create Match</h3>
    <input type="text" name="name" placeholder="enter match name" class="box" required>
    <input type="text" name="city" placeholder="enter city" class="box" required>
    <input type="date" name="date" placeholder="enter the Date of the match" class="box" required>
    <input type="time" name="time" placeholder="enter the Time of the match" class="box" required>
    <input type="submit" name="submit" value="Create" class="btn">
</form>

</div>
