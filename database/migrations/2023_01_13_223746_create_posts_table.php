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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('writer');
            $table->string('post_title')->unique();
            $table->string('post_slug')->unique();
            $table->string('post_thambnail');
            $table->integer('post_parent_category');
            $table->integer('post_sub_category')->nullable();
            $table->string('post_status');
            $table->string('post_type');
            $table->string('post_kind');
            $table->longText('post_description');
            $table->timestamps();
            $table->softDeletes();
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
};
