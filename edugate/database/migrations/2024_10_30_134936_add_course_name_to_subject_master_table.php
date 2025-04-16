<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('subject_master', function (Blueprint $table) {
        $table->string('course_name')->nullable(); // Add nullable() if you want to allow null values
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subject_master', function (Blueprint $table) {
            //
        });
    }
};