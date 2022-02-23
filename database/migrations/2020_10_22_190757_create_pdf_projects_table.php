<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('generate_pdf_id');
            $table->string('name');
            $table->string('number');
            $table->string('hours')->nullable();
            // $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('updates')->nullable();
            $table->text('described_problems')->nullable();
            $table->text('described_solution')->nullable();
            $table->text('described_languages')->nullable();
            $table->text('technical_newness')->nullable();
            
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
        Schema::dropIfExists('pdf_projects');
    }
}
