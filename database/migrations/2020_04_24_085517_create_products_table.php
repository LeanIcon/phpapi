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
			$table->string('name');
			$table->text('photo', 65535);
			$table->timestamps();
			$table->bigInteger('supplies_id')->nullable();
			$table->bigInteger('other_products_id')->nullable();
			$table->bigInteger('manufacturers_id')->nullable();
			$table->bigInteger('equipments_id')->nullable();
			$table->bigInteger('product_category_id')->nullable();
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
