<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGeneratePdfTableAddWbsoType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('generate_pdf', function (Blueprint $table) {
        //     $table->enum('wbso_type',['complete','performa'])->nullable()->after("service");
        //     $table->string('start_date')->nullable()->change();
        //     $table->string('end_date')->nullable()->change();
        //     $table->string('ref_number')->nullable()->change();
        // });
        Schema::table('generate_pdf', function (Blueprint $table) {
            DB::statement("ALTER TABLE `generate_pdf`
ADD `wbso_type` enum('complete','performa') COLLATE 'utf8mb4_unicode_ci' NULL AFTER `service`,
CHANGE `start_date` `start_date` varchar(191) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `wbso_type`,
CHANGE `end_date` `end_date` varchar(191) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `start_date`,
CHANGE `ref_number` `ref_number` varchar(191) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `in_months`;");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
