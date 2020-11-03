<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestPrizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contest_prize', function (Blueprint $table) {
            $table->foreignId('contest_id');
            $table->foreignId('prize_id');
            $table->unsignedInteger('max_win')->nullable(false);
            $table->unsignedInteger('win_rating')->nullable(false);

            $table->unique(['contest_id', 'prize_id']);
            $table->foreign('contest_id')->references('id')->on('contests')->cascadeOnDelete();
            $table->foreign('prize_id')->references('id')->on('prizes')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contest_prize');
    }
}
