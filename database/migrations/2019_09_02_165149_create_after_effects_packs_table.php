<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfterEffectsPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('after_effects_packs', function (Blueprint $table) {
            $table->bigIncrements('intPackID');
            $table->integer('intSort')->default(0);
            $table->float('varVersion')->default(1.0);
            $table->string('varName',255);
            $table->string('varImg')->nullable();
            $table->text('varDescription');
            $table->string('varLink',255);
            $table->boolean('isEnabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('after_effects_packs');
    }
}
