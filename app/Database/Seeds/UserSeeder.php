<?php

namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
	public function run()
	{
		$faker = \Faker\Factory::create();
		for ($i = 0; $i < 30; $i++) {
			$user = [
				'username' => 'user'.$i,
				'name' => $faker->sentence(2, true),
				'salt' => uniqid('', true),	
				'password' => $faker->sentence(6, true),
				'email' => 'user@institutazzuhra.ac.id',
				'birthdate' => date('Y-m-d H:i:s'),
				'address' => $faker->paragraph(6, true),
				'phone_number'=> '0000-0000-0000',
				'avatar' => base_url('assets/images/user.jpeg'),
				'role' => 'Admin',
				'status' => 'Not active',
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => 202,
			];
			echo "Inserting ".($i + 1)." Dummy Data\n";
			$this->db->table('user')->insert($user);
		}
	}
}
