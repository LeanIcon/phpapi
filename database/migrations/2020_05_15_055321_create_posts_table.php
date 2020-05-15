<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('author_id');
			$table->string('title', 191);
			$table->string('slug', 191);
			$table->text('excerpt', 65535);
			$table->text('body', 65535);
			$table->string('image', 191);
			$table->integer('category_post_id');
			$table->integer('view_count')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
