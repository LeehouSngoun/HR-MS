<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_details', function (Blueprint $table) {
            $table->id();
            $table->integer("employee_id");
            $table->integer("payroll_id");
            $table->double("basic_pay")->nullable();
            $table->double("days_work")->nullable();
            $table->double("overtime_hour")->nullable();
            $table->double("annual_leave")->nullable();
            $table->double("unpaid_leave")->nullable();
            $table->double("education_allowance")->nullable();
            $table->double("transport_allowance")->nullable();
            $table->double("food_allowance")->nullable();
            $table->double("overtime_allowance")->nullable();
            $table->double("total_earning")->nullable();
            $table->double("property_damage")->nullable();
            $table->double("loan")->nullable();
            $table->double("tax")->nullable();
            $table->double("total_deduction")->nullable();
            $table->double("net_pay")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll_details');
    }
}
