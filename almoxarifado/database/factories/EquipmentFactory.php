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
			'image' => $this->faker->randomElement(['https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJgNd2Xdl8Z3yh0BG7TUYkq4KSOxVh6jyWEdyBkYUVk8lhLLAJbIkVl3pSfmEbRwhmNZw&usqp=CAU']),
			'patrimony' => $this->faker->randomElement(['Braip-1', 'Braip-2']),
			'status' => $this->faker->randomElement(['Disponível', 'Indisponível']),
		];
	}
}
