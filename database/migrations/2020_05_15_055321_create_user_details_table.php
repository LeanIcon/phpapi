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
			$table->string('location', 191)->nullable();
			$table->string('digital_address', 191)->nullable();
			$table->string('business_address', 191)->nullable();
			$table->string('reg_no', 191)->nullable();
			$table->string('contact_person', 191)->nullable();
			$table->string('practise_group', 191)->nullable();
			$table->timestamps();
			$table->bigInteger('users_id');
			$table->bigInteger('town_id')->nullable();
			$table->string('contact_person_phone', 191)->nullable();
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
