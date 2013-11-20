<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kots', function(Blueprint $table) {
			$table->increments('id');
			$table->string('adresse');
			$table->integer('lat');
			$table->integer('lng');
			$table->string('exerpt');
			$table->integer('postal_id');
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
		Schema::drop('kots');
	}

}
