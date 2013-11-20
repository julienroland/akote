<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRechercheEnregistreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rechercheEnregistre', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('users_id');
			$table->string('nom');
			$table->text('recherche');
			$table->integer('types_id');
			
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
		Schema::drop('rechercheEnregistre');
	}

}
