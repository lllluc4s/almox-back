<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// importar faker
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
			'id' => $this->faker->unique()->randomNumber(5),
			'name' => $this->faker->randomElement(['PC Desktop', 'Notebook']),
			'brand' => $this->faker->randomElement(['Dell', 'Apple']),
			'patrimony' => $this->faker->randomElement(['Braip-01', 'Braip-02']),
		];
	}
}
