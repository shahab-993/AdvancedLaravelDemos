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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('middlename');
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('birthdate');
            $table->date('hiredate');
            $table->string('email');
            $table->string('phone', 13);
            $table->integer('postalcode');
            $table->string('websiteurl');
            $table->enum('role', ['admin', 'moderator', 'regular']);
            $table->boolean('termsandconditions')->default(false);            
            $table->integer('age');
            $table->decimal('salary', 10, 2);            
            $table->integer('amount');            
            $table->string('secondary_email'); 
            $table->string('profile_picture');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
