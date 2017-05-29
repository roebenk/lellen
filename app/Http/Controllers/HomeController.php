<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Mail;
use App\Models\Game;
use DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	/*
    	$abc = [
    		['Michael', 'Anastasakis.Michael@kpmg.nl'],
    		['Martijn', 'Blankert.Martijn@kpmg.nl'],
    		['Sille', 'Kamoen.Sille@kpmg.nl'],
    		['Wesley', 'vanderLee.Wesley@kpmg.nl'],
    		['Laurens', 'tenHacken.Laurens@kpmg.nl'],
    		['Rogier', 'Vrooman.Rogier@kpmg.nl'],
    		['Jurrit', 'Wilhelmus.Jurrit@kpmg.nl'],
    		['Mourad', 'ElMaouchi.Mourad@kpmg.nl'],
    		['Vincent', 'deJager.Vincent@kpmg.nl'],
    		['Wouter', 'vanderHouven.Wouter@kpmg.nl']
    	];
    	foreach($abc as $a) {
	    	$u = new User();
	    	$u->name = $a[0];
	    	$u->email = $a[1];
	    	$u->password = bcrypt(rand(1,9000000000000));
	    	$u->save();
    	}*/

    	$data['users']  = User::orderBy('rating', 'desc')->get();

        return view('home', $data);
    }

    public function test() {
        
        $games = Game::all();

        DB::update("UPDATE users SET elo_rating = 1000, wins = 0, losses = 0, goals_for = 0, goals_against = 0");

        foreach($games as $game) {

            Game::addGame(
                $game->created_by_user_id,
                $game->player_a1_id == -1 ? 'guest' : $game->player_a1_id,
                $game->player_a2_id == -1 ? 'guest' : $game->player_a2_id,
                $game->player_b1_id == -1 ? 'guest' : $game->player_b1_id,
                $game->player_b2_id == -1 ? 'guest' : $game->player_b2_id,
                $game->score_a,
                $game->score_b,
                $game->id
            );
        }


    }

}
