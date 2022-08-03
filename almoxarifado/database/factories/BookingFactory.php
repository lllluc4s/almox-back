<?php

namespace Database\Factories;

use App\Models\Equipment;
use App\Models\User;
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
		$user = User::all()->pluck('id')->toArray();
		$equipment = Equipment::all()->pluck('id')->toArray();

		return [
			'user_id' => $this->faker->randomElement($user),
			'equipment_id' => $this->faker->randomElement($equipment),
			'bookingDate' => $this->faker->dateTimeBetween('now', '+1 years'),
			'transaction' => $this->faker->randomElement(['Entrada', 'Saída']),
		];
	}
}
