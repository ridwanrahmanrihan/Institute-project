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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('jober_name');
            $table->string('jober_phone_number');
            $table->string('jober_email');
            $table->string('passing_year');
            $table->string('jober_district');
            $table->string('jober_company');
            $table->string('jober_roll');
            $table->string('jober_department');
            $table->string('jober_status');
            $table->longText('jober_address');
            $table->string('jober_designation');
            $table->string('jober_image');
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
        Schema::dropIfExists('jobs');
    }
};
