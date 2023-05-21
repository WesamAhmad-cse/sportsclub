<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\User;
use App\Models\Users_matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class playerMatch extends Controller
{
    public function registration()
    {
        return view('registration');
    }

    public function registrationPost(Request $req)
    {
        // $test = $req->file('image')->getClientOriginalExtension();
        // dd($test);

        $req->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|max:191|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required|confirmed',
            'image' => ['sometimes', 'image', 'mimes:jpj,jpeg,svg,png', 'max:5000'],

        ]);

        if (request()->has('image')) {
            //$imageUploaded = request()->file('image');
            $imageName = time() . '_' . $req->name . '.' . $req->image->extension();
            // dd($imageName);
            $req->image->move(public_path('images'), $imageName);

            // $imageUploaded->move($imagePath, $imageName);

        }

        $data['first_name'] = $req->first_name;
        $data['last_name'] = $req->last_name;
        $data['email'] = $req->email;
        $data['password'] = Hash::make($req->password);
        $data['image'] = $req->image;
        $data['role_id'] = $req->role_id;
        $user = User::create($data);
        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration faild try again");
        }
        return redirect(route('login'))->with("success", "Registration success");
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $req)
    {

        $req->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
        $user = User::where('email', $req->email)->first();
        // $match = Users_matches::where('match_id', $user->id)->get();
        // $m = Matches::where('id', $match)->first();
        // $matches = json_decode($m);

        $credentials = $req->only('email', 'password');
        if (Auth::attempt($credentials) && $user->role_id == 1) {
            return redirect()->intended(route('trainerHome'))->with('user', $user);
        }
        return redirect(route('playerHome'));

    }

    public function getMatches()
    {
        //dd(auth()->user()->id);

        $player = User::where('role_id', '2')
            ->where('id', auth()->user()->id)->first();
        //dd($player);
        $matchID = Users_matches::where('user_id', $player->id)->get();

        foreach ($matchID as $m) {
            $mtch = json_decode($m);
            //dd($m);
            $matches[] = Matches::where('id', $mtch->match_id)->get();
        }
        // dd($matches);
        return view('playerHomePage', compact('matches'));
        // return redirect(route('playerHome', compact('matches')));

    }

    public function playerHome()
    {
        return view('playerHomePage');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

}