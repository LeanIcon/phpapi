<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBulkOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bulk_orders', function(Blueprint $table)
		{
			$table->bigInteger('id')->nullable();
			$table->dateTime('order_date')->nullable();
			$table->string('order_status')->nullable();
			$table->dateTime('delivery_date')->nullable();
			$table->string('purchase_order')->nullable();
			$table->string('invoice_number')->nullable();
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
		Schema::drop('bulk_orders');
	}

}
