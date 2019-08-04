<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomepageReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('homepage_reviews', function (Blueprint $table) {
            $table->bigIncrements('intReviewID');
            $table->string('varName',255);
            $table->string('varLink',255);
            $table->string('varPosition',255);
            $table->text('varText');
            $table->integer('intOrder')->default(0);
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
        Schema::dropIfExists('homepage_reviews');
    }
}
