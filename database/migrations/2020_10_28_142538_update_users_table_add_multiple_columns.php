<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddMultipleColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('title')->nullable()->after("password");
            $table->string('initials')->nullable()->after("title");
            $table->string('insertions')->nullable()->after("initials");
            $table->enum('gender', ["Male","Female"])->nullable()->after("insertions");
            $table->string('mobile')->nullable()->after("gender");
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
