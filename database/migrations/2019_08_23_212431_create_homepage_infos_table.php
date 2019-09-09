<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('homepage_infos', function (Blueprint $table) {
            $table->bigIncrements('intInfoID');
            $table->string('varImgUrl')->nullable();
            $table->string('varType');
            $table->string('varVideoUrl')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_infos');
    }
}
