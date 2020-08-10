<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortageListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortage_list', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('reference')->nullable();
            $table->string('reference_code')->nullable();
            $table->string('user_id');
            $table->string('instance');
            $table->longText('content');
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
        Schema::dropIfExists('shortage_list');
    }
}
