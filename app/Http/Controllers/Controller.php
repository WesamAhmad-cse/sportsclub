<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    public function getRole_id()
    {
        $user = Auth::user();
        $user = $user->role_id;
        return redirect(view('header'))->with('user', $user);

    }

}
