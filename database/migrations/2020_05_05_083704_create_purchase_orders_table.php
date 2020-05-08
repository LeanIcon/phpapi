<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('retailer_id');
            $table->bigInteger('wholesaler_id');
            $table->bigInteger('products_id');
            $table->string('product_name');
            $table->longText('description');
            $table->unsignedInteger('quantity');
            $table->string('manufacturer');
            $table->string('price');
            $table->string('wholesaler_visible')->nullable()->default('false');
            $table->string('order_type');
            $table->string('status')->nullable()->default('pending');
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
        Schema::dropIfExists('purchase_orders');
    }
}
