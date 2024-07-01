<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->string('enroll_no');
            // $table->unsignedBigInteger('enrollment_id');
            $table->unsignedBigInteger('enrollments_id');
            $table->timestamp('paid_date');
            $table->double('amount');
            $table->foreign('enrollments_id')->references('id')->on('enrollments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
