<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('title');
	        $table->string('url')->unique();
	        $table->integer('user_id')->unsigned();
	        $table->boolean('deleted')->default(0);
            $table->timestamps();

	        $table->foreign('user_id')
		        ->references('id')
		        ->on('users')
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
        Schema::dropIfExists('articles');
    }
}
