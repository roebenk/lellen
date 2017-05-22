<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('goals_for')->default(0);
            $table->integer('goals_against')->default(0);
            $table->integer('wins')->default(0);
            $table->integer('losses')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('goals_for');
            $table->dropColumn('goals_against');
            $table->dropColumn('losses');
            $table->dropColumn('wins');
        });
    }
}
