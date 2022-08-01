<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->faker = Faker::create('pt_BR');

		// Reset cached roles and permissions
		app()[PermissionRegistrar::class]->forgetCachedPermissions();

		Permission::create(['name' =>
		'UsersIndex']);
		Permission::create(['name' =>
		'UsersCreate']);
		Permission::create(['name' =>
		'UsersDelete']);

		Permission::create(['name' =>
		'EquipmentsIndex']);
		Permission::create(['name' =>
		'EquipmentsCreate']);
		Permission::create(['name' =>
		'EquipmentsDelete']);

		Permission::create(['name' =>
		'BookingsIndex']);
		Permission::create(['name' =>
		'BookingsCreate']);
		Permission::create(['name' =>
		'BookingsDelete']);

		// create roles and assign existing permissions
		$role1 = Role::create(['name' => 'admin']);
		$role1->givePermissionTo('UsersIndex', 'UsersCreate', 'UsersDelete', 'EquipmentsIndex', 'EquipmentsCreate', 'EquipmentsDelete', 'BookingsIndex', 'BookingsCreate', 'BookingsDelete');

		$role2 = Role::create(['name' => 'user']);
		$role2->givePermissionTo('EquipmentsIndex', 'BookingsIndex', 'BookingsCreate');

		$userAdmin = \App\Models\User::factory()->create([
			// 'id' => 1,
			'name' => 'Admin',
			'email' => 'admin@admin.com',
			'password' => Hash::make('1234'),
			// 'remember_token' => '',
		]);
		$userAdmin->assignRole($role1);

		$user1 = \App\Models\User::factory()->create([
			// 'id' => 2,
			'name' => 'User1',
			'email' => 'user1@user.com',
			'password' => Hash::make('1234'),
			// 'remember_token' => '',
		]);
		$user1->assignRole($role2);

		$user2 = \App\Models\User::factory()->create([
			// 'id' => 3,
			'name' => 'User2',
			'email' => 'user2@user.com',
			'password' => Hash::make('1234'),
			// 'remember_token' => '',
		]);
		$user2->assignRole($role2);
	}
}
