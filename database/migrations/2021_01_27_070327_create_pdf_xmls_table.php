<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfXmlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_xmls', function (Blueprint $table) {
            $table->id();
            $table->Integer('generate_pdf_id');
            $table->Integer('user_id');
            $table->string('xml_name');
            $table->mediumtext('xml_content');
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
        Schema::dropIfExists('pdf_xmls');
    }
}
