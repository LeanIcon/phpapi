<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('firstname');
			$table->string('lastname');
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('slug')->nullable();
			$table->string('type', 20)->nullable();
			$table->string('phone', 15)->nullable();
			$table->string('password');
			$table->integer('is_superuser')->default(0);
			$table->integer('is_active')->default(0);
			$table->integer('is_staff')->default(0);
			$table->text('bio', 65535)->nullable();
			$table->dateTime('last_login')->nullable();
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
		Schema::drop('users');
	}

}
