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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable()->after('id');
            $table->integer('age')->nullable();
            $table->unsignedBigInteger('role_id')->default(2);
            $table->integer('NOFA')->default(0);
            $table->boolean('is_locked')->default(false);
            $table->foreign('country_id')->references('id')->on('countries')->nullOnDelete();
            $table->foreign('role_id')->references('id')->on('roles');

            
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
