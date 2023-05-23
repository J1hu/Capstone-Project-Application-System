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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('batch_num');
            $table->date('current_date')->default(\Carbon\Carbon::now()->format('Y-m-d'));

            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs');

            $table->unsignedBigInteger('school_year_id')->nullable();
            $table->foreign('school_year_id')->references('id')->on('school_years');
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
        Schema::dropIfExists('batches');
    }
};
