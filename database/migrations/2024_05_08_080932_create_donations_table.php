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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('criteria')->nullable();
            $table->integer('amount')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('isadmin')->default(0); 
            $table->string('name')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id','name')->references('id')->on('users');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
