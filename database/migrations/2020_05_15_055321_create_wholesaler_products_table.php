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
			$table->bigIncrements('id');
			$table->string('batch_number', 191);
			$table->decimal('price', 19, 2)->default(0.00);
			$table->dateTime('expiry_date');
			$table->string('expiry_status', 191);
			$table->string('type', 191);
			$table->string('product_name')->nullable();
			$table->string('product_code')->nullable();
			$table->string('active_ingredient')->nullable();
			$table->string('strength')->nullable();
			$table->string('dosage_form')->nullable();
			$table->string('packet_size')->nullable();
			$table->string('manufacturer')->nullable();
			$table->string('drug_legal_status')->nullable();
			$table->integer('status')->nullable()->default(1);
			$table->timestamps();
			$table->softDeletes();
			$table->integer('wholesaler_id');
			$table->bigInteger('products_id');
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
