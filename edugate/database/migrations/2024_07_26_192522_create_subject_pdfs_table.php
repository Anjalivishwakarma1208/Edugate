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
        Schema::create('subject_pdfs', function (Blueprint $table) {
            $table->id('pdf_id');
            
            // $table->foreign('sub_id')->references('sub_id')->on('subject_master')->onDelete('cascade');
            $table->Integer('sub_id');
            
            
            // $table->foreign('course')->references('course')->on('courses')->onDelete('cascade');
            $table->integer('course');
            
            // $table->foreign('sem_id')->references('sem_id')->on('semester_master')->onDelete('cascade');
            $table->integer('sem_id');
            $table->string('file_name', 255);
            $table->smallInteger('status')->default(0);
            $table->timestamps(); // DATETIME NOT NULL with default CURRENT_TIMESTAMP, update on change
            $table->unsignedInteger('created_by')->nullable(); // INT NOT NULL
      });
    }

    /**
     * Reverse the migrations.
     */     
    public function down(): void
    {
        Schema::dropIfExists('subject_pdfs');
    }
};
