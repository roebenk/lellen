<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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


    public function calculateRating($teammate, $opponent_1, $opponent_2, $for, $against) {

        $winPoints = 10;
        $weightGoalDeficit = 0.2;
        $goalDeficit = abs($for - $against);
        $ratingDivider = ($opponent_1->rating + $opponent_2->rating) / ($this->rating + $teammate->rating + $opponent_1->rating + $opponent_2->rating) * 2;

        // Win
        if($for > $against) {

            $max                = $winPoints * $ratingDivider;
            $calculatedGoals    = $max - ($max * $weightGoalDeficit * (1 - ($goalDeficit / max($for, $against))) * $ratingDivider);
            $calucatedRating    = $calculatedGoals - ($calculatedGoals * (1 - ((200 - $this->rating + $teammate->rating) / 200)));
            $minRating          = max(1, $calucatedRating);

            $toAdd              = max(1, ($minRating * (1 - ($this->rating / ($this->rating + $teammate->rating)))));
            $this->rating       = min(100, $this->rating + $toAdd);

        } else {

            $losePoints = 10;
            $weightGoalDeficit = 0.6;
            $goalDeficit = abs($for - $against);
            $ratingDivider = ($opponent_1->rating + $opponent_2->rating) / ($this->rating + $teammate->rating + $opponent_1->rating + $opponent_2->rating) * 2;

            $max                = $winPoints * $ratingDivider;
            $calculatedGoals    = $max - ($max * $weightGoalDeficit * (1 - ($goalDeficit / max($for, $against))) * $ratingDivider);
            $calucatedRating    = $calculatedGoals - ($calculatedGoals * (1 - (($this->rating + $teammate->rating) / 200)));
            $minRating          = max(1, $calucatedRating);

            $toSubstract        = min(1, ($minRating * ($this->rating / ($this->rating + $teammate->rating))));
            $this->rating       = max(1, $this->rating - $toSubstract); 

        }

        $this->save();

        $this->calcualteELORatings($teammate, $opponent_1, $opponent_2, $for, $against);

    }

    public function calcualteELORatings($teammate, $opponent_1, $opponent_2, $for, $against) {

        $currentRating  = ($this->elo_rating + $teammate->elo_rating) / 2;
        $constant       = 50;
        $win            = ($for > $against) ? 1 : 0;
        $diff           = $currentRating - (($opponent_1->elo_rating + $opponent_2->elo_rating) / 2);
        $expectedW      = 1 / (pow(10, (-1 * $diff / 400)) + 1);

        $newRating      = $currentRating + $constant * ($win - $expectedW);

        $diffRating     = $newRating * 2 - $currentRating * 2;

        var_dump($diffRating);
        var_dump($for);
        var_dump($against);
        var_dump($win);
        var_dump($diff);
        var_dump($expectedW);
        var_dump($this->name);
        var_dump($this->elo_rating);
        var_dump($teammate->name);
        var_dump($teammate->elo_rating);

        //exit;

        if($win == 1) {
            $toAdd      = ($diffRating * (1 - ($this->elo_rating / ($this->elo_rating + $teammate->elo_rating))));
            $this->elo_rating = $this->elo_rating + $toAdd;
        } elseif($win == 0) {
            $toSub      = ($diffRating * ($this->elo_rating / ($this->elo_rating + $teammate->elo_rating)));
            $this->elo_rating = $this->elo_rating + $toSub;
        }

        $this->save();


    }


}