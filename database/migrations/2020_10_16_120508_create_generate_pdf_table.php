<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneratePdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generate_pdf', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('company_id');
            $table->Integer('user_id');
            $table->enum('service', ["wbso","via","mit"]);
            $table->string('start_date');
            $table->string('end_date');
            $table->float('in_months')->nullable();
            $table->string('ref_number');
            $table->string('total_hours')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('amount_per_month')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('generate_pdf');
    }
}
