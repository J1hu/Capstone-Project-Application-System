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
        Schema::create('applicant_guardians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('guardian_fname');
            $table->string('guardian_mname');
            $table->string('guardian_lname');
            $table->string('guardian_religion');
            $table->string('guardian_occupation');
            $table->float('guardian_annual_income');
            $table->string('guardian_phone_num');
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
        Schema::dropIfExists('applicant_guardians');
    }
};
