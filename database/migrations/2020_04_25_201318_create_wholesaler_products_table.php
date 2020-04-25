<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWholesalerProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wholesaler_products', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('batch_number');
			$table->decimal('price', 19, 8)->default(0.00000000);
			$table->dateTime('expiry_date');
			$table->string('expiry_status');
			$table->string('type');
			$table->integer('status');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('wholesalers_id');
			$table->bigInteger('products_id');
			$table->integer('drugs_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wholesaler_products');
	}

}
