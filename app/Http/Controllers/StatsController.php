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
    	$data['avg_goals'] = round($goals[0]->total / $data['num_played'], 1);

    	$data['num_users'] = User::count();
    	$data['goals_per_user'] = round($goals[0]->total / $data['num_users'], 1);

    	$skill = DB::select("SELECT ROUND(AVG(elo_rating), 0) AS avg_rating FROM users");
    	$data['avg_rating'] = $skill[0]->avg_rating;


		return view('stats.index', $data);
    }

}
