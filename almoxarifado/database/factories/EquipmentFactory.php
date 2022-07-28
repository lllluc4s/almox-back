<?php

namespace Database\Factories;

use App\Models\User;
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
		$user = User::all()->pluck('id')->toArray();

		return [
			'user_id' => $this->faker->randomElement($user),
			'type' => $this->faker->randomElement(['PC Desktop', 'Notebook']),
			'brand' => $this->faker->randomElement(['Dell', 'Apple']),
			'patrimony' => $this->faker->randomElement(['Braip-01', 'Braip-02']),
			'status' => $this->faker->randomElement(['Disponível', 'Indisponível']),
		];
	}
}
