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
        Schema::table('posts',function(Blueprint $table){
            $table->integer('author_id');
            $table->foreign('author_id')->references('id')->on('persons')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts',function(Blueprint $table){
            $table->dropForeign(['authord_id']);
            $table->dropColumn('author_id');
        });
    }
};
