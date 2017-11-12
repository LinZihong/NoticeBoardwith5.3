<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('participations', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('activity_id');
            $table->integer('user_id');
            $table->integer('checker_id')->nullable();
            $table->integer('duration');//use minutes
            $table->string('status');//pending, approved, participated
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
