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
        Schema::create('application_statuses', function (Blueprint $table) {
            $table->id();
            $table->enum('application_status_name', [
                'verified',
                'filled',
                'pending',
                'passed',
                'file resubmit',
                'backed out',
                'for exam',
                'passed exam',
                'failed exam',
                'for interview',
                'passed interview',
                'failed interview',
                'for orientation',
                'done orientation',
                'for enrollment'
            ]);
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
        Schema::dropIfExists('application_statuses');
    }
};
