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
			'equipment_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
			'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
			'booking_date' => $this->faker->dateTimeBetween('now', '+1 years'),
			'return_date' => $this->faker->dateTimeBetween('now', '+1 years'),
		];
	}
}
