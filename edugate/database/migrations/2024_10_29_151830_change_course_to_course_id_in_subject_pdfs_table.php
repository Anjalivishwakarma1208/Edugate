<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCourseToCourseIdInSubjectPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_pdfs', function (Blueprint $table) {
            // Check if 'course' column exists before renaming
            if (Schema::hasColumn('subject_pdfs', 'course')) {
                $table->renameColumn('course', 'course_id');
            } else {
                // Optional: log an error or throw an exception
                throw new \Exception("Column 'course' does not exist in 'subject_pdfs' table.");
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_pdfs', function (Blueprint $table) {
            // Check if 'course_id' column exists before renaming back
            if (Schema::hasColumn('subject_pdfs', 'course_id')) {
                $table->renameColumn('course_id', 'course');
            }
        });
    }
}