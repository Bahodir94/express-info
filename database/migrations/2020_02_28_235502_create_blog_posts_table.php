<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ru_title');
            $table->string('en_title');
            $table->string('uz_title');
            $table->text('ru_short_content');
            $table->text('en_short_content');
            $table->text('uz_short_content');
            $table->text('ru_content');
            $table->text('en_content');
            $table->text('uz_content');
            $table->string('image')->nullable();
            $table->string('ru_slug')->nullable();
            $table->string('en_slug')->nullable();
            $table->string('uz_slug')->nullable();
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
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
        Schema::dropIfExists('blog_posts');
    }
}
