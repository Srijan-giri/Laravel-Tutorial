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
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('employee_id')->autoIncrement()->from(1);
            $table->string('name',30);
            $table->string('email')->unique()->nullable();
            $table->string('phone',10)->nullable()->default('0000000000')->comment('Phone number of the employee');
            $table->integer('age')->unsigned();
            $table->primary('employee_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
