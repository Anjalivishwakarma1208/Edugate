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
    if (!Schema::hasTable('semester_master')) {
        Schema::create('semester_master', function (Blueprint $table) {
            $table->id('sem_id')->autoIncrement();
            $table->unsignedBigInteger('course');
            $table->foreign('course')->references('id')->on('courses')->onDelete('cascade');
            $table->integer('semester_number');
            $table->integer('year'); 
            $table->smallInteger('status')->default(0);
            $table->dateTime('created_on');
            $table->dateTime('updated_on')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semester_master');
    }
};
