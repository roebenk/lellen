<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use Validator;
use Auth;

class UserController extends Controller
{

    public function index() {
        $data['users'] = User::orderBy('elo_rating', 'desc')->paginate(20);

        return view('users.index', $data);

    }

    public function show($id) {

        $user = User::find($id);

        if($user) {
            $games = $user->games(false, 'desc');
            $data['games'] = $games;
        }

        $ratingOverTime = [];
        $i = 1;


        $_games = $data['games']->reverse();

        foreach($_games as $game) {
            if($user->id == $game->player_a1_id) {
                $r = $game->player_a1_rating;
            } elseif($user->id == $game->player_a2_id) {
                $r = $game->player_a2_rating;
            } elseif($user->id == $game->player_b1_id) {
                $r = $game->player_b1_rating;
            } elseif($user->id == $game->player_b2_id) {
                $r = $game->player_b2_rating;
            }

            $ratingOverTime[] = [
                'i' => $i++,
                'date' => $game->created_at,
                'rating' => $r
            ];

        }


        $data['ratingOverTime'] = $ratingOverTime;
        $data['users'] = User::all()->keyBy('id');
        $data['users'][-1] = (object) ['name' => 'Guest player'];

        $data['user'] = $user;
        //var_dump($games);
        //exit;
        return view('users.show', $data);

    }

    public function edit($id) {

        if($id != Auth::user()->id) {
            return redirect('users')->with('flashmessage', ['message' => 'You are not allowed to edit this user', 'class' => 'danger']);
        }


        $data['user'] = Auth::user();

        return view('users.edit', $data);

    }

    public function update($id, Request $request) {

        if($id != Auth::user()->id) {
            return redirect('users')->with('flashmessage', ['message' => 'You are not allowed to edit this user', 'class' => 'danger']);
        }

        $rules =  [
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id . '|regex:/^[A-Za-z0-9\.]*@(kpmg)[.](nl)$/',
            'password' => 'string|min:6|confirmed',
        ];

        if($request->get('password') == '') {
            unset($rules['password']);
        }

        $validator = Validator::make($request->all(), $rules);


        $user = Auth::user();

        if ($validator->fails()) {
            return redirect('users/' . $user->id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $user->email = $request->get('email');

        if(strlen($request->get('password')) >= 6) {
            $user->password = bcrypt($request->get('password'));
        }

        $user->save();

        return redirect('users/' . $user->id)->with('flashmessage', ['message' => 'Profile successfully updated.', 'class' => 'success']);

    }

}
