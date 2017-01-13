<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment',400);
            $table->integer('user_id')->unsigned();
            $table->integer('article_id')->unsigned();
            $table->boolean('deleted')->default(0);
            $table->timestamps();

	        $table->foreign('user_id')
		        ->references('id')
		        ->on('users')
		        ->onUpdate('cascade')
		        ->onDelete('cascade');
	        $table->foreign('article_id')
		        ->references('id')
		        ->on('articles')
		        ->onUpdate('cascade')
	            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
