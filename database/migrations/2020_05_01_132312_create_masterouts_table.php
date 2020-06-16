<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasteroutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('arrangenumber');
            $table->string('arrangefirst')->nullable();
            $table->integer('first_score')->nullable();
            $table->string('arrangesecond')->nullable();
            $table->integer('second_score')->nullable();
            $table->string('arrangethird')->nullable();
            $table->integer('third_score')->nullable();
            $table->string('arrangememo')->nullable();
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
        Schema::dropIfExists('masterouts');
    }
}
