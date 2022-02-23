<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCompaniesTableAddMultipleColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('kvk')->nullable()->after("status");
            $table->string('rsin')->nullable()->after("kvk");
            $table->string('legal_form')->nullable()->after("rsin");
            $table->string('streat_name')->nullable()->after("legal_form");
            $table->string('house_number')->nullable()->after("streat_name");
            $table->string('addition')->nullable()->after("house_number");
            $table->string('post_code')->nullable()->after("addition");
            $table->string('place_name')->nullable()->after("post_code");
            $table->string('land')->nullable()->after("place_name");
            $table->string('www')->nullable()->after("land");
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
