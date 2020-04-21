<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openouts', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('arrangenumber');
            $table->integer('arrangefirst')->default(0);
            $table->integer('arrangesecond')->default(0);
            $table->integer('arrangethird')->default(0);
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
        Schema::dropIfExists('openouts');
    }
}
