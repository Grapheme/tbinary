<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('in_menu')->default(0);
			$table->integer('sort_menu')->default(0);
			$table->string('language');
			$table->string('name');
			$table->string('url');
			$table->string('title');
			$table->text('description');
			$table->text('keywords');
			$table->mediumText('content');
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
		Schema::drop('pages');
	}

}
