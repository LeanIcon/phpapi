<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_details', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('location')->nullable();
			$table->string('digital_address')->nullable();
			$table->string('business_address')->nullable();
			$table->string('reg_no')->nullable();
			$table->string('contact_person')->nullable();
			$table->string('practise_group')->nullable();
			$table->timestamps();
			$table->bigInteger('users_id');
			$table->bigInteger('town_id')->nullable();
			$table->string('contact_person_phone')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_details');
	}

}
