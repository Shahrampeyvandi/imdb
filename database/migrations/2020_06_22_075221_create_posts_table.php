<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type',['series','movies']);
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('stars')->nullable();  //save in array
            $table->string('poster')->nullable();
            $table->string('duration')->nullable();
            $table->string('product_year')->nullable();
            $table->string('imdbID')->nullable();
            $table->string('imdbRating')->nullable();
            $table->string('imdbVotes')->nullable();
            $table->string('age_rate')->nullable();
            $table->string('plot')->nullable();
            $table->text('awards')->nullable();
            $table->unsignedBigInteger('views')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
