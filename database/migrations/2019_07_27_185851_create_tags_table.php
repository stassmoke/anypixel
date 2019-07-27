<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('intTagID');
            $table->string('varName',255);
            $table->string('varLink',255);
            $table->unsignedInteger('intOrder')->default(0);
            $table->boolean('isEnabled')->default(false);
            $table->timestamps();

            $table->unique(['varLink']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
}
