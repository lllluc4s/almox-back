<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\User;

use App\Models\Booking;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// User::factory(2)->create();

		// 	\App\Models\User::factory()->create([
		// 		'name' => 'Admin',
		// 		'email' => 'admin@admin.com',
		// 	]);

		$this->call(UserSeeder::class);

		Equipment::factory(2)->create();
		Booking::factory(2)->create();
	}
}
