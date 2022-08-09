<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\App\Models\Equipment::factory()->create([
			// 'id' => 1,
			'type' => 'PC Desktop',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 2,
			'type' => 'Notebook',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 3,
			'type' => 'Monitor',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 4,
			'type' => 'Mouse',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 5,
			'type' => 'Teclado',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 6,
			'type' => 'Headset',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 7,
			'type' => 'Cadeira',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 8,
			'type' => 'Impressora',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 9,
			'type' => 'Cabo',
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 10,
			'type' => 'Fonte',
			'status' => 'Disponível',
		]);
	}
}
