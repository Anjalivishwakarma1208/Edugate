<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCourseIdToSubjectMasterTable extends Migration
{
    public function up()
    {
        Schema::table('subject_master', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->after('sub_id'); // Adjust the position as needed
        });
    }

    public function down()
    {
        Schema::table('subject_master', function (Blueprint $table) {
            $table->dropColumn('course_id');
        });
    }

};