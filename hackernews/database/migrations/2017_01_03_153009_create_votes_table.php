<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('up');
            $table->integer('user_id')->unsigned();
	        $table->integer('article_id')->unsigned();
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
        Schema::dropIfExists('votes');
    }
}
