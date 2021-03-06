<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Product
 * @package App\Models
 * @property int intProductID
 * @property int intCatID
 * @property string varName
 * @property string varSubtitle
 * @property string varSlug
 * @property string varLink
 * @property string varAuthor
 * @property string varMainImage
 * @property string varThumbnailImage
 * @property string varDescription
 * @property string varYoutubeCode
 * @property float varPrice
 * @property string intRating
 * @property string isEnabled
 * @property string isNew
 * @property string isCheapest
 * @property string isBestSelling
 * @property string isLatest
 * @property string created_at
 * @property string updated_at
 */
class Product extends Model
{
    public $primaryKey = 'intProductID';

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'intCatID','intCatID');
    }

    /**
     * @return HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class,'intProductID','intProductID');
    }

    /**
     * @return string
     */
    public function getThumbnailImage(): string
    {
        return '/storage/images/' . $this->varThumbnailImage;
    }

    /**
     * @return string
     */
    public function getMainImage(): string
    {
        return '/storage/images/' . $this->varMainImage;
    }
}
