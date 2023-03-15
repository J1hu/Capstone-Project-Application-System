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
        Schema::create('applicants', function (Blueprint $table) {
            //student personal data
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->enum('applicant_type', ['Old Student', 'New Student', 'Old Returnee']);
            $table->enum('sex', ['Male', 'Female']);
            $table->date('birthdate');
            $table->string('phone_num');
            $table->string('fb_link');
            $table->string('religion');
            $table->string('avatar');
            // family data
            $table->unsignedInteger('total_fam_members');
            $table->string('birth_order');
            // educational background
            $table->string('last_school');
            $table->text('last_school_address');
            $table->enum('school_type', ['Public', 'Private', 'State University']);
            $table->string('lrn');
            $table->enum('esc_grantee', ['Yes', 'No', 'N/A']);
            $table->string('esc_num')->nullable();
            // program choice
            $table->foreignId('program_id')->constrained()->cascadeOnDelete();
            // other information
            $table->text('free_ebill_reason');
            $table->float('monthly_rental');
            $table->boolean('data_privacy_consent');
            $table->date('date_accomplished');
            // system requirements
            $table->foreignId('batch_id')->nullable()->constrained('batches')->cascadeOnDelete();
            $table->foreignId('application_status_id')->nullable()->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('applicants');
    }
};
