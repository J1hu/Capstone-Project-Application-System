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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignID('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('remarks')->nullable();
            $table->string('evaluation_type')->nullable();
            $table->string('approval')->nullable();
            $table->foreignId('scholarship_type_id')->nullable();
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
        Schema::dropIfExists('evaluations');
    }
};
