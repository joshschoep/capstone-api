<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->string('headline');
            $table->mediumText('short');
            $table->longText('content');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('section_id')->references('id')->on('sections');

            $table->string('thumbnail_url')->nullable();
            $table->string('thumbnail_inline_location')->nullable();
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
