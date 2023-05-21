<?php

use App\Http\Controllers\playerMatch;
use App\Http\Controllers\trainerMatch;
use App\Http\Controllers\userMatchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
//     $player = User::where('role_id', '2')
//         ->where('id', auth()->user()->id)->first();

//     $matchID = Users_matches::where('user_id', $player->id)->get();
// //dd($matchID);
//     foreach ($matchID as $m) {
//         // dd($m);
//         $mtch = json_decode($m);
//         //dd($mtch);
//         $matches[] = Matches::where('id', $mtch->match_id)->get();
//         // $matches = json_decode($match[]);

//         // session()->put('matches', $matches)->with('matches', $matches[]);
//     }
//     //dd($matches);
//     return view('playerHomePage', compact('matches'));

})->name('match');

Route::get('/login', [playerMatch::class, 'login'])->name(name:'login');
Route::post('/login', [playerMatch::class, 'loginPost'])->name(name:'login.post');

Route::get('/registration', [playerMatch::class, 'registration'])->name(name:'registration');
Route::post('/registration', [playerMatch::class, 'registrationPost'])->name(name:'registration.post');

Route::get('/logout', [playerMatch::class, 'logout'])->name(name:'logout');

Route::get('/player', [playerMatch::class, 'getMatches'])->name('match');

Route::middleware(['trainer', 'auth'])->group(function () {
    Route::get('/trainer/home', [trainerMatch::class, 'trainerhome'])->name(name:'trainerHome');
    Route::get('/trainer/home/AddPlayer', [trainerMatch::class, 'addPlayer'])->name(name:'addPlayer');
    Route::get('/trainer/home/createMatch', [trainerMatch::class, 'createMatch'])->name(name:'createMatch');
    Route::get('/trainer/home/deletePlayer', [trainerMatch::class, 'delete'])->name(name:'delete');
    Route::get('/trainer/home/assignPlayer', [userMatchController::class, 'assignPlayer'])->name(name:'assignPlayer');

    Route::get('/logout', [playerMatch::class, 'logout'])->name(name:'logout');

})->name('trainer');

Route::post('/trainer/home/assign', [userMatchController::class, 'assignPlayerToMatch'])->name(name:'assignPlayerToMatch');
Route::post('/trainer/home/delete', [trainerMatch::class, 'deletePost'])->name(name:'deletePost');
Route::post('/trainer/home/match', [trainerMatch::class, 'createMatchPost'])->name(name:'createMatchPost');
Route::post('/trainer/home/addplayer', [trainerMatch::class, 'addPlayerPost'])->name(name:'addPlayerPost');

Route::get('/player/home', [playerMatch::class, 'playerHome'])->name(name:'playerHome');
Route::get('/logout', [playerMatch::class, 'logout'])->name(name:'logout');
