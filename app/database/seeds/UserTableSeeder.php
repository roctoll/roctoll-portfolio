<?php

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'name'     => 'Roc Toll',
			'username' => 'roctoll',
			'email'    => 'roc@roctoll.com',
			'password' => Hash::make('admin'),
		));
	}

}
