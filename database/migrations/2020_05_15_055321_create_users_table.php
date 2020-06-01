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
			$table->bigIncrements('id');
			$table->string('firstname', 255)->nullable();
			$table->string('lastname', 255)->nullable();
			$table->string('name', 255);
			$table->string('email', 191)->nullable();
			$table->string('slug', 191)->nullable();
			$table->string('type', 20)->nullable();
			$table->string('phone', 15)->nullable();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('remember_token', 100)->nullable();
			$table->string('password', 191);
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
