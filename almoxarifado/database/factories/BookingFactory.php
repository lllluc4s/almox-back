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
		$userId = User::all()->pluck('id')->toArray();
		$userName = User::all()->pluck('name')->toArray();
		$equipment = Equipment::all()->pluck('id')->toArray();
		$equipmentType = Equipment::all()->pluck('type')->toArray();

		return [
			'user_id' => $this->faker->randomElement($userId),
			'user_name' => $this->faker->randomElement($userName),
			'equipment_id' => $this->faker->randomElement($equipment),
			'equipment_type' => $this->faker->randomElement($equipmentType),
			'bookingDate' => $this->faker->dateTimeBetween('now', '+1 years'),
			'transaction' => $this->faker->randomElement(['Reserva', 'Devolução']),
		];
	}
}
