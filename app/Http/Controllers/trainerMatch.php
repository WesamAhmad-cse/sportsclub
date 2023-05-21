<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class trainerMatch extends Controller
{

    public function trainerHome()
    {

        return view('trainerHome');

    }

    public function createMatch()
    {

        return view('createMatch');

    }

    public function createMatchPost(request $req)
    {
        $match = new Matches();
        $match->name = $req->input('name');
        $match->city = $req->input('city');
        $match->date = $req->input('date');
        $match->time = $req->input('time');
        $match->save();
        // return $match;
    }

    public function delete()
    {

        return view('delete');

    }

    public function deletePost(Request $req)
    {
        $player = new User;
        $player->id = $req->input('id');
        $player = User::where('id', $player->id)->delete();
        if ($player) {
            $data = "player has been deleted";
            return ["player has been deleted"];
        } else {
            return ["result" => "Operation faild"];
        }
    }

    public function addPlayer()
    {

        return view('AddPlayer');

    }
    public function addPlayerPost(Request $req)
    {
        $player = new User;

        $player->role_id = $req->input('role_id');
        $player->first_name = $req->input('first_name');
        $player->last_name = $req->input('last_name');
        $player->email = $req->input('email');
        $player->password = Hash::make($req->input('password'));
        $player->image = $req->input('image');
        $player->save();

        //return 'added successfully';
    }

}
