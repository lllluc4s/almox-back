<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookingFactory extends Factory
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
			'equipment_id' => $this->faker->randomElement([1, 2]),
			'user_id' => $this->faker->randomElement([1, 2, 3]),
			'date' => $this->faker->dateTimeBetween('now', '+1 years'),
			'trasaction' => $this->faker->randomElement(['Entrada', 'Saída']),
		];
	}
}
