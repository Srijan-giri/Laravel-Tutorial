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
        // rename the column
        Schema::rename('students','student');

        // drop table if its exist
        Schema::dropIfExists('students_details');


        // Schema has this table
        if(Schema::hasTable('tasks')){
            Schema::rename('tasks','task');
        }

        Schema::rename('user_deatils','user_details');

        // if schema has this table column
        if(Schema::hasColumn('user_details','name')){
            Schema::table('user_details', function(Blueprint $table){
                $table->string('email')->after('name');
                $table->string('phone')->after('email');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

        Schema::dropIfExists('student');
        Schema::dropIfExists('task');
        Schema::dropIfExists('user_details');
    }
};
