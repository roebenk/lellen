<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('player_a1_id');
            $table->integer('player_a2_id');
            $table->integer('player_b1_id');
            $table->integer('player_b2_id');

            $table->integer('player_a1_rating');
            $table->integer('player_a2_rating');
            $table->integer('player_b1_rating');
            $table->integer('player_b2_rating');

            $table->integer('score_a');
            $table->integer('score_b');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
