<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMonthsTableUpdateDaysColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                Schema::table('generate_pdf', function (Blueprint $table) {
            DB::statement("ALTER TABLE `months`
CHANGE `days` `days` mediumtext COLLATE 'utf8mb4_unicode_ci' NOT NULL AFTER `current_year`;");
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
