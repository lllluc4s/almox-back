<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bookings', function (Blueprint $table) {
			$table->id();
			$table->index(['id' => 'id']);

			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('user_name');
			$table->foreign('user_name')->references('name')->on('users');

			$table->unsignedBigInteger('equipment_id');
			$table->foreign('equipment_id')->references('id')->on('equipment');
			$table->string('equipment_type');
			$table->foreign('equipment_type')->references('type')->on('equipment');

			$table->string('patrimony');
			$table->integer('quantity');
			$table->date('bookingDate');
			$table->string('transaction');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('booking');
	}
};
