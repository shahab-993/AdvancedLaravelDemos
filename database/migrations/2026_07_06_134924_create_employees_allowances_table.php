
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
        Schema::create('employees_allowances', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained('part_time_employees');
            $table->foreignId('allowance_type_id')->constrained('allowance_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_allowances');
    }
};
