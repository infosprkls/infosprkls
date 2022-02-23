<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministrativeDecisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrative_decisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->nullable(false);
            $table->string('project_name');
            $table->integer('project_hours');
            $table->dateTime('project_start_date');
            $table->dateTime('project_end_date');
            $table->integer('amount'); // TODO: add a more descriptive name after getting info about this
            $table->decimal('accountable_money');
            $table->enum('status', ["In progress","Granted","Rejected","Partially Granted"]);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrative_decisions');
    }
}
