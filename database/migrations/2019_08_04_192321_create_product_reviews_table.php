<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->bigIncrements('intReviewID');
            $table->integer('intProductID');
            $table->string('varName',255);
            $table->integer('intRating')->default(0);
            $table->text('varComment')->nullable();

            $table->timestamps();

            $table->index(['intProductID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
}
