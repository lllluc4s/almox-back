<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		\App\Models\Booking::factory()->create([
			// 'id' => 1,
			'user_id' => 1,
			'user_name' => 'Lucas',
			'equipment_type' => 'Notebook',
			'equipment_id' => 2,
			'patrimony' => 'Braip',
			'quantity' => 1,
			'bookingDate' => '2021-07-28',
			'transaction' => 'Reserva',
		]);
	}
}
