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
                //pending
                'verified',
                'filled',
                'pending',
                'file resubmit',
                'for exam',
                'passed exam',
                'for interview',
                'passed interview',
                'for orientation',
                //evaluated
                'done orientation',
                'for enrollment',
                'passed',
                //failed
                'failed interview',
                'failed exam',
                'backed out',
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
