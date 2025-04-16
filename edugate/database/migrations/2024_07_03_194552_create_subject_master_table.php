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
        Schema::create('subject_master', function (Blueprint $table) {
            $table->bigIncrements('sub_id')->unsigned(); // Primary key
            $table->bigInteger('sem_id'); // Foreign key referencing 'semester_master'
            $table->unsignedBigInteger('course'); // Example foreign key
            $table->string('name');
            $table->smallInteger('status')->default(0);
            $table->timestamps();
            
            // Foreign key constraint
            // $table->foreign('sem_id')->references('sem_id')->on('semester_master')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_master');
    }
};