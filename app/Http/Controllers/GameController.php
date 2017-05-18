<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use Validator;

class GameController extends Controller
{

    public function create() {

        $data['users'] = User::all();

        return view('games.create', $data);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'player_a1' => 'required|integer|exists:users,id',
            'player_a2' => 'required|integer|exists:users,id',
            'player_b1' => 'required|integer|exists:users,id',
            'player_b2' => 'required|integer|exists:users,id',
            'score_a'   => 'required|integer|between:-1,11',
            'score_b'   => 'required|integer|between:-1,11'
        ]);

        if ($validator->fails()) {
            return redirect('games/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $players = [$request->get('player_a1'), $request->get('player_a2'), $request->get('player_b1'), $request->get('player_b2')];
   
        if(count($players) != count(array_unique($players))) {
            return redirect('games/create')
                        ->withErrors(['message' => 'Players must be unique'])
                        ->withInput();
        }

        if($request->get('score_a') == $request->get('score_b')) {
            return redirect('games/create')
                        ->withErrors(['message' => 'No draw allowed'])
                        ->withInput();
        }

        Game::addGame($players[0], $players[1], $players[2], $players[3], $request->get('score_a'), $request->get('score_b'));

        return redirect('/');

    }

}
