<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoLecturesTable extends Migration
{
    public function up()
    {
        Schema::create('video_lectures', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('course_id'); // Add this line if it doesn't exist
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('video_lectures');
    }
}
