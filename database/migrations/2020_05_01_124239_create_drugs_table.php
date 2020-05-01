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
			$table->string('code', 191);
			$table->string('active_ingredients', 191);
			$table->string('associated_name', 191);
			$table->string('category', 191);
			$table->string('strength', 191);
			$table->string('type', 191);
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
