<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $new_elo_rating;

    public function getGoalsDifference() {
        return $this->goals_for - $this->goals_against;
    }

    public function games($limit = 10, $order = 'desc') {

        $g = Game::where('player_a1_id', $this->id)
                    ->orWhere('player_a2_id', $this->id)
                    ->orWhere('player_b1_id', $this->id)
                    ->orWhere('player_b2_id', $this->id)
                    ->orderBy('created_at', $order);
                    
        if($limit != false) {
            $g->limit($limit);
        }

        return $g->get();



    }

    public function processGame($for, $against) {

        $this->goals_for += $for;
        $this->goals_against += $against;

        if($for > $against) {
            $this->wins++;
        } else {
            $this->losses++;
        }

        $this->save();

    }

    public function calculateRating($teammate, $opponent_1, $opponent_2, $for, $against) {

        $currentRating  = ($this->elo_rating + $teammate->elo_rating) / 2;
        $constant       = 50;
        $win            = ($for > $against) ? 1 : 0;
        $diff           = $currentRating - (($opponent_1->elo_rating + $opponent_2->elo_rating) / 2);
        $expectedW      = 1 / (pow(10, (-1 * $diff / 400)) + 1);

        $newRating      = $currentRating + $constant * ($win - $expectedW);

        $diffRating     = $newRating * 2 - $currentRating * 2;

        //exit;

        if($win == 1) {
            $toAdd      = ($diffRating * (1 - ($this->elo_rating / ($this->elo_rating + $teammate->elo_rating))));
            $this->new_elo_rating = $this->elo_rating + $toAdd;
        } elseif($win == 0) {
            $toSub      = ($diffRating * ($this->elo_rating / ($this->elo_rating + $teammate->elo_rating)));
            $this->new_elo_rating = $this->elo_rating + $toSub;
        }


    }

    public function persistEloRating() {
        $this->elo_rating = $this->new_elo_rating;
        $this->save();
    }


}
