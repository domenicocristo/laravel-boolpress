<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->foreign('post_id', 'post_tag')->references('id')->on('posts');
            $table->foreign('tag_id', 'tag_post')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->dropForeign('post_tag');
            $table->dropForeign('tag_post');
        });
    }
}