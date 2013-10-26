<?php 


class UsersTableSeeder extends seeder
{
	
	public function run()
	{

		DB::table('users')->delete();

		User::create(array(
			'nom'=>'Roland',
			'prenom'=>'Julien',
			'email'=>'roland.julien.perso@gmail.com',
			'motdepasse'=>'mdp'
			));	

	
	
	}
}