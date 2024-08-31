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
        Schema::create('payroll', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('employee_id')->nullable();
            $table->string('number_of_days_worked')->nullable();
            $table->string('bonus')->nullable();
            $table->string('overtime')->nullable();
            $table->string('gross_salary')->nullable();
            $table->string('cash_advance')->nullable();
            $table->string('late_hours')->nullable();
            $table->string('absent_days')->nullable();
            $table->string('sss_contribution')->nullable();
            $table->string('insure_health')->nullable();
            $table->string('total_deduction')->nullable();
            $table->string('net_pay')->nullable();
            $table->string('payroll_monthly')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll');
    }
};
