<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::create('activities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('creator_id');
			$table->string('creator_type');//individual or club
			$table->integer('club_id')->nullable();
			$table->string('title');
			$table->string('intro');
			$table->integer('duration');//use minutes
			$table->date('reg_start');
			$table->date('reg_end');
			$table->string('verified_by')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
