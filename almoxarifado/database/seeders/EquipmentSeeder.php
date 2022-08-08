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
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 2,
			'type' => 'Notebook',
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 3,
			'type' => 'Monitor',
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 4,
			'type' => 'Mouse',
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 5,
			'type' => 'Teclado',
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 6,
			'type' => 'Headset',
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 7,
			'type' => 'Cadeira',
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 8,
			'type' => 'Impressora',
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 9,
			'type' => 'Cabo',
			'quantity' => 10,
			'status' => 'Disponível',
		]);

		\App\Models\Equipment::factory()->create([
			// 'id' => 10,
			'type' => 'Fonte',
			'quantity' => 10,
			'status' => 'Disponível',
		]);
	}
}
