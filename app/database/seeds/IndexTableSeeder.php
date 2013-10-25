<?php 


class IndexTableSeeder extends seeder
{
	
	public function run()
	{

		DB::table('accueil')->delete();

		Index::create(array(
			'titre'=>'Lorem',
			'texte'=>'Lorem Ipsum'
			));	

		Index::create(array(
			'titre'=>'Lorem2',
			'texte'=>'Lorem Ipsum2'
			));
	
	}
}