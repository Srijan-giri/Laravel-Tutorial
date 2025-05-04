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
        Schema::table('students', function (Blueprint $table) {


            // update --> after(), before() , change() [mendetory]
            // rename column
        //    $table->renameColumn('city','cities');

           // drop column
           $table->dropColumn('percentage');

           // update column
           $table->string('city',20)->default('No City')->change();

           $table->integer('votes')->unsigned()
                                    ->default(1)
                                    ->comment('My Comment');

            // after email column (position change)
            $table->integer('votes')->after('email')->change();


            $table->after('votes',function(Blueprint $table){
                $table->string('phone',10)->default('No Phone');
                $table->string('city',20)->change();
            });

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
};
