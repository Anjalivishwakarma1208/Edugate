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
    Schema::table('semester_master', function (Blueprint $table) {
        $table->integer('semester_number')->nullable(); // Add the column with the desired data type
    });
}

public function down()
{
    Schema::table('semester_master', function (Blueprint $table) {
        $table->dropColumn('semester_number');
    });
}

};
