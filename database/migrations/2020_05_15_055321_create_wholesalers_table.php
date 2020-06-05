<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWholesalersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wholesalers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('digital_address', 191);
			$table->string('phone', 15);
			$table->string('business_address', 191);
			$table->integer('status');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('townid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wholesalers');
	}

}
