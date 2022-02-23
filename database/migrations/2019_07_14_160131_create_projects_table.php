<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('status', ["Not started","In progress","On hold","Completed"]);
            $table->unsignedBigInteger('responsible_user_id');
            $table->integer('amount_of_hours');
            $table->text('description');
            $table->enum('project_type', ["Task","Person"])->default('Task');
            $table->unsignedBigInteger('created_by_user_id');
            $table->dateTime('started_at')->nullable(true);
            $table->dateTime('deadline')->nullable(true);
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
        Schema::dropIfExists('projects');
    }
}
