<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvantroCodeUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('evantro_code_users', function (Blueprint $table) {
            $table->bigIncrements('intCodeUserID');
            $table->integer('intCodeID');
            $table->string('varUserName',255);
            $table->string('varEmail',255);
            $table->timestamps();
            $table->index(['intCodeID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('evantro_code_users');
    }
}
