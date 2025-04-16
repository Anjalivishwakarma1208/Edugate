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
        Schema::create('semester_master', function (Blueprint $table) {
            $table->id();
            $table->integer('semester_number');
            $table->unsignedBigInteger('course_id'); // Ensure this matches the type of 'id' in courses
            $table->integer('status');
            $table->timestamps();
        
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester_master');
    }
};
