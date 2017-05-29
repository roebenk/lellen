<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use Validator;
use Auth;

class GameController extends Controller
{

    public function index() {
        $data['games'] = Game::orderBy('created_at', 'desc')->paginate(15);
        $data['users'] = User::all()->keyBy('id');
        $data['users'][-1] = (object) ['name' => 'Guest player'];


        return view('games.index', $data);
    }

    public function create() {

        $data['users'] = User::all();

        return view('games.create', $data);
    }

    public function store(Request $request) {

        $rules = [
            'player_a1' => 'required|integer|exists:users,id',
            'player_a2' => 'required|integer|exists:users,id',
            'player_b1' => 'required|integer|exists:users,id',
            'player_b2' => 'required|integer|exists:users,id',
            'score_a'   => 'required|integer|between:-1,11',
            'score_b'   => 'required|integer|between:-1,11'
        ];

        if($request->get('player_a1') == 'guest') {
            unset($rules['player_a1']);
        }

        if($request->get('player_a2') == 'guest') {
            unset($rules['player_a2']);
        }

        if($request->get('player_b1') == 'guest') {
            unset($rules['player_b1']);
        }

        if($request->get('player_b2') == 'guest') {
            unset($rules['player_b2']);
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('games/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $players = [$request->get('player_a1'), $request->get('player_a2'), $request->get('player_b1'), $request->get('player_b2')];
        $_players = [];

        do {
            $search = array_search('guest', $players);
            
            if($search != false) {
                $_players[$search] = 'guest';
                unset($players[$search]);
            }

        } while($search != false);

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

        foreach($_players as $key => $value) {
            $players[$key] = $value;
        }


        Game::addGame(Auth::user()->id, $players[0], $players[1], $players[2], $players[3], $request->get('score_a'), $request->get('score_b'));

        return redirect('/users')->with('flashmessage', ['message' => 'Game successfully added.', 'class' => 'success']);

    }

}
