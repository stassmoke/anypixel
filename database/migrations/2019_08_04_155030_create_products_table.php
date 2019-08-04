<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('intProductID');
            $table->integer('intCatID');
            $table->string('varName',255);
            $table->string('varSubtitle',255)->nullable();
            $table->string('varSlug',255);
            $table->string('varLink',255);
            $table->string('varYoutubeCode',255)->nullable();
            $table->string('varMainImage',255)->nullable();
            $table->string('varThumbnailImage',255)->nullable();
            $table->text('varDescription');
            $table->decimal('varPrice',10,2);
            $table->integer('intRating')->default(0);
            $table->boolean('isEnabled')->default(false);
            $table->boolean('isNew')->default(false);
            $table->boolean('isCheapest')->default(false);
            $table->boolean('isBestSelling')->default(false);
            $table->timestamps();

            $table->unique(['varSlug']);
            $table->index(['intCatID','isEnabled','isNew','isCheapest','isBestSelling']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
