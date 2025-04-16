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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key as 'id', auto-incrementing unsigned big integer
            $table->string('course_name'); // Name of the course
            $table->text('description')->nullable(); // Description of the course (nullable in case it's optional)
            $table->string('image')->nullable(); // Image filename (nullable in case it's optional)
            $table->smallInteger('status')->default(0); // Status field (0 = inactive, 1 = active, default 0)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
