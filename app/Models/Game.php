<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Game extends Model {
    
    public static function addGame($created_by, $player_a1, $player_a2, $player_b1, $player_b2, $score_a, $score_b) {


        $players['a1']  = User::findOrFail($player_a1);
        $players['a2']  = User::findOrFail($player_a2);
        $players['b1']  = User::findOrFail($player_b1);
        $players['b2']  = User::findOrFail($player_b2);

        $game = new Game();
        $game->created_by_user_id = $created_by;
        
        $game->player_a1_id = $player_a1;
        $game->player_a2_id = $player_a2;
        $game->player_b1_id = $player_b1;
        $game->player_b2_id = $player_b2;

        $game->player_a1_rating = $players['a1']->rating;
        $game->player_a2_rating = $players['a2']->rating;
        $game->player_b1_rating = $players['b1']->rating;
        $game->player_b2_rating = $players['b2']->rating;

        $game->score_a      = $score_a;
        $game->score_b      = $score_b;
        $game->save();


        foreach($players as $key => $player) {
            if($key == 'a1') {
                $teammate   = $players['a2'];
                $opponent_1 = $players['b1'];
                $opponent_2 = $players['b2'];
                $for        = $score_a;
                $against    = $score_b;
            } elseif($key == 'a2') {
                $teammate   = $players['a1'];
                $opponent_1 = $players['b1'];
                $opponent_2 = $players['b2'];
                $for        = $score_a;
                $against    = $score_b;
            } elseif($key == 'b1') {
                $teammate   = $players['b2'];
                $opponent_1 = $players['a1'];
                $opponent_2 = $players['a2'];
                $for        = $score_b;
                $against    = $score_a;
            } elseif($key == 'b2') {
                $teammate   = $players['b1'];
                $opponent_1 = $players['a1'];
                $opponent_2 = $players['a2'];
                $for        = $score_b;
                $against    = $score_a;
            }
            $player->calculateRating($teammate, $opponent_1, $opponent_2, $for, $against);
            $player->processGame($for, $against);
        }

    }

}
