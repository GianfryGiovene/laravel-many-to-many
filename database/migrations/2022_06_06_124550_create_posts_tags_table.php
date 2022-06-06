<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            if (!Schema::hasTable('post_tag')){
                Schema::create('post_tag', function (Blueprint $table){
                    if(!Schema::hasColumn('post_tag', 'post_id')){
                        $table->unsignedBigInteger('post_id');
                        $table->foreign('post_id')->references('id')->on('posts');
                    }
                    if(!Schema::hasColumn('post_tag', 'post_id')){
                        $table->unsignedBigInteger('tag_id');
                        $table->foreign('tag_id')->references('id')->on('tags');
                    }
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_tags');
    }
}
