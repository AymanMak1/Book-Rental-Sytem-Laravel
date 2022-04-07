<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {

            $table->integer('book_id')->unsigned();

            $table->integer('genre_id')->unsigned();

            $table->primary(['book_id', 'genre_id']);

            $table->foreign('book_id')->references('id')->on('books')

                ->onDelete('cascade');

            $table->foreign('genre_id')->references('id')->on('genres')

                ->onDelete('cascade');

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
        Schema::dropIfExists('book_genre');
    }
};
