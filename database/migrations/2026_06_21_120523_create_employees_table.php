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
            $table->id();
             
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('title_name',['Mr','Ms','Mrs']);
            $table->boolean('has_passport')->nullable();
            $table->decimal('salary',15,2)->nullable();
            $table->date('birth_date')->nullable();
            $table->date('hire_date')->nullable();
            $table->text('notes')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->unsignedBigInteger('department_id' )->nullable();
            $table->unsignedBigInteger('country_id' )->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('country_id')->references('id')->on('countries');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
