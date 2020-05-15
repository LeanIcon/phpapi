<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('name', 191);
			$table->string('slug', 20)->nullable();
			$table->text('photo', 65535)->nullable();
			$table->timestamps();
			$table->string('code', 50)->nullable();
			$table->string('status')->nullable();
			$table->text('active_ingredients')->nullable();
			$table->bigInteger('dosage_form_id')->nullable();
			$table->bigInteger('drug_class_id')->nullable();
			$table->string('associated_name')->nullable();
			$table->string('strength')->nullable();
			$table->string('packet_size', 50)->nullable();
			$table->bigInteger('product_category_id')->nullable();
			$table->bigInteger('manufacturer_id')->nullable();
			$table->string('dosage_form_slug', 20)->nullable();
			$table->string('drug_class_slug', 20)->nullable();
			$table->string('manufacturer_slug', 20)->nullable();
			$table->string('product_category_slug', 20)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
