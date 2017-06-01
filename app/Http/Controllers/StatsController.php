<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use DB;

class StatsController extends Controller
{

    public function index(){

    	$data['num_played'] = Game::count();
    	$goals = DB::select("SELECT SUM(score_a) + SUM(score_b) AS total FROM games");
    	$data['num_goals'] = $goals[0]->total;

		return view('stats.index', $data);
    }

}
