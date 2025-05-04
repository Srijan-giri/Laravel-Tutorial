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
        Schema::create('students', function (Blueprint $table) {
            // $table->id();
            // $table->string('name',30);
            // $table->string('email');
            // $table->float('percentage',3,2);
            // $table->timestamps();

            $table->integer('student_id')->autoIncrement()->from(1);
            $table->string('name', 30);
            $table->string('email')->unique()->nullable();
            $table->float('percentage', 3, 2)->comment("Student Percentage");
            $table->timestamps();
            $table->primary('student_id');
            $table->string('pincode')->default('000000')->comment('Pincode of the student');
            $table->integer('age')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
