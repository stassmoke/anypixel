<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAfterEffectsPackAddEvantroId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('after_effects_packs', function (Blueprint $table) {
            $table->integer('intEvantroID');
            $table->index(['intEvantroID']);
            $table->dropColumn(['varVersion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('after_effects_packs', function (Blueprint $table) {
            $table->dropIndex(['intEvantroID']);
            $table->dropColumn(['intEvantroID']);
            $table->float('varVersion')->default(1.0);
        });
    }
}
