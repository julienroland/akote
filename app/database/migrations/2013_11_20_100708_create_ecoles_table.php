<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEcolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ecoles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nom');
			$table->string('initial');
			$table->string('siteweb');
			$table->integer('postal_id');
			$table->string('adresse');
			$table->integer('lat');
			$table->integer('lng');
			
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
		Schema::drop('ecoles');
	}

}
