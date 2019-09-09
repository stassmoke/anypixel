<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->bigIncrements('intSocialID');
            $table->string('varName',255);
            $table->string('varIcon');
            $table->string('varLink');
            $table->integer('intSort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
}
