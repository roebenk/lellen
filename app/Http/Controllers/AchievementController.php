<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use Validator;
use Auth;

class AchievementController extends Controller
{

    public function index() {
        return view('achievements.index');
    }

    
}
