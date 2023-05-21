<?php

namespace App\Http\Controllers;

use App\Models\Users_matches;
use Illuminate\Http\Request;

class userMatchController extends Controller
{

    public function assignPlayer()
    {

        return view('assignPlayer');

    }
    public function assignPlayerToMatch(request $req)
    {
        $usersMatches = new Users_matches();
        $usersMatches->user_id = $req->user_id;
        $usersMatches->match_id = $req->match_id;
        $usersMatches->save();
        return response()->json($usersMatches);
    }

}
