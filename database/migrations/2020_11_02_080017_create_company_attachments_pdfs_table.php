<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyAttachmentsPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_attachments_pdfs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('ref_id');
            $table->Integer('company_id');
            $table->string('file')->nullable();
            $table->string('file2')->nullable();
            $table->enum('type', ["Attachment","Pdf"]);
            $table->enum('status', ["Approved","Declined"])->default('Approved');
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
        Schema::dropIfExists('company_attachments_pdfs');
    }
}
