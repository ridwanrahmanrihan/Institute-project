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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->integer('student_roll');
            $table->integer('student_registretion');
            $table->integer('student_phone_number');
            $table->string('student_email');
            $table->text('student_about')->nullable();
            $table->string('student_image');
            $table->string('department');
            $table->string('student_shift');
            $table->string('student_seemester');
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
        Schema::dropIfExists('students');
    }
};
