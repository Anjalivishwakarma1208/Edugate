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
        $table->boolean('status')->default(1); // or use the appropriate type and default value
    });
}

public function down()
{
    Schema::table('semester_master', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
