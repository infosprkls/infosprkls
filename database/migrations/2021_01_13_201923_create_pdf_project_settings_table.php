<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfProjectSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_project_settings', function (Blueprint $table) {
            $table->id();
            $table->Integer('generate_pdf_id');
            // $table->enum('status',['In-progress','Toegekend','Afgewezen','Vragenbrief']);
            $table->string('due_date');
            $table->text('log_text');
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
        Schema::dropIfExists('pdf_project_settings');
    }
}
