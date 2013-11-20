<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChambresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chambres', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('numero');
			$table->integer('kots_id');
			$table->integer('users_id');
			$table->integer('prix');
			$table->string('disponible');
			
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
		Schema::drop('chambres');
	}

}
