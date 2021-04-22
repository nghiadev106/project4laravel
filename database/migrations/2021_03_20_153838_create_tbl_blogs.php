<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_blogs', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('blog_name');
            $table->text('blog_desc');
            $table->text('blog_content');
            $table->string('blog_image');
            $table->string('blog_image_list');
            $table->integer('blog_status');
            $table->text('blog_meta_description');
            $table->string('blog_meta_keyword');
            $table->text('blog_meta_title');
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
        Schema::dropIfExists('tbl_blogs');
    }
}
