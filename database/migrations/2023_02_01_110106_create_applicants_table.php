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
            $table->foreignId('user_id')->constrained();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->foreign('applicant_email')
                ->references('email')
                ->on('users')
                ->onDelete('cascade');
            $table->enum('applicant_type', ['Old Student', 'New Student', 'Old Returnee']);
            $table->enum('sex', ['Male', 'Female']);
            $table->date('birthdate');
            $table->foreignId('address_id')->constrained();
            $table->string('phone_num');
            $table->string('fb_link');
            $table->string('religion');
            $table->string('avatar');
            // family data
            $table->string('total_fam_members');
            $table->string('birth_order');
            $table->foreignId('siblings');
            // parent or guardian data
            $table->foreignId('mother');
            $table->foreignId('father');
            $table->foreignId('guardian')->nullable();
            // educational background
            $table->string('last_school');
            $table->string('last_school_address');
            $table->enum('school_type', ['Public', 'Private', 'State University']);
            $table->string('lrn');
            $table->enum('esc_grantee', ['Yes', 'No', 'N/A']);
            $table->string('esc_num')->nullable();
            $table->foreignId('acad_award_id')->constrained();
            // program choice
            $table->foreignId('program_id');
            // other information
            $table->foreignId('gadget_id')->constrained();
            $table->foreignId('internet_type_id')->constrained();
            $table->string('free_ebill_reason')->nullable();
            $table->foreignId('house_ownership_id')->constrained();
            $table->boolean('data_privacy_consent');
            $table->date('date_accomplished');
            // system requirements
            $table->foreignId('scholarship_type_id')->nullable();
            $table->foreignId('application_status_id')->nullable();
            $table->foreignId('exam_score_id')->nullable();
            $table->foreignId('interview_remark_id')->nullable();
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
