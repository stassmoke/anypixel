<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->bigIncrements('intCountID');
            $table->string('varName',255);
            $table->string('varAlias',255);
            $table->boolean('isEnabled')->default(false);
            $table->integer('intSort')->default(0);
            $table->integer('intValue')->default(0);

            $table->index('intSort');
            $table->index('isEnabled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('counters');
    }
}
