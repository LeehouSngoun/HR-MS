<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer("schedule_id");
            $table->integer("position_id");
            $table->string("photo")->nullable();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("gender");
            $table->string("identity");
            $table->string("email");
            $table->string("contact");
            $table->integer("manage_id");
            $table->date("birthdate");
            $table->string("bank_name")->nullable();
            $table->string("bank_account")->nullable();
            $table->string("education")->nullable();
            $table->string("skill")->nullable();
            $table->string("address")->nullable();
            $table->string("rank");
            $table->string("status");
            $table->date("resign_date")->nullable();
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
        Schema::dropIfExists('employees');
    }
}
