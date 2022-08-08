<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EquipmentFactory extends Factory
{

	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'type' => $this->faker->randomElement(['PC Desktop', 'Notebook', 'Monitor', 'Mouse', 'Teclado', 'Headset', 'Cadeira', 'Impressora', 'Cabo', 'Fonte']),
			'patrimony' => $this->faker->randomElement(['Braip', 'Kapsula', 'KPG']),
			'status' => $this->faker->randomElement(['Disponível', 'Indisponível']),
		];
	}
}
