<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTagTable extends Migration
{
  public function up()
    {
      Schema::create('book_tag', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('book_id')->unsigned();
          $table->foreign('book_id')->references('id')->on('books');
          $table->integer('tag_id')->unsigned();
          $table->foreign('tag_id')->references('id')->on('tags');
      });
    }

    public function down()
    {
        Schema::drop('book_tag');
    }
}
