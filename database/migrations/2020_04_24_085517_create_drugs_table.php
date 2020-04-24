<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDrugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('drugs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('code');
			$table->string('active_ingredients');
			$table->string('associated_name');
			$table->string('category');
			$table->string('strength');
			$table->string('type');
			$table->integer('status');
			$table->timestamps();
			$table->integer('drug_class_id');
			$table->integer('drug_form_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('drugs');
	}

}
