<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaggedTable extends Migration {

	public function up() {
		Schema::create('tagging_tagged', function(Blueprint $table) {
			$table->increments('id');
			if(config('tagging.primary_keys_type') == 'string') {
				$table->string('taggable_id', 36)->index();
			} else {
				$table->integer('taggable_id')->unsigned()->index();
			}
			$table->string('taggable_type', 191)->index();
			$table->string('tag_name', 191);
			$table->string('tag_slug', 191)->index();
		});
	}

	public function down() {
		Schema::drop('tagging_tagged');
	}
}
