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
        Schema::table('employees',function(Blueprint $table){
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('salary_id');
            $table->foreign('city_id')->references('id')->on('city')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('salary_id')->references('id')->on('salary')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Drop foreign keys and columns if they exist
            if (Schema::hasColumn('employees', 'city_id')) {
                $table->dropForeign(['city_id']);
                $table->dropColumn('city_id');
            }

            if (Schema::hasColumn('employees', 'salary_id')) {
                $table->dropForeign(['salary_id']);
                $table->dropColumn('salary_id');
            }
        });

    }
};
