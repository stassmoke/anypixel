<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Product
 * @package App\Models
 * @property int intProductID
 * @property int intCatID
 * @property string varName
 * @property string varSubtitle
 * @property string varSlug
 * @property string varLink
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
 * @property string created_at
 * @property string updated_at
 */
class Product extends Model
{
    protected $primaryKey = 'intProductID';

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'intCatID','intCatID');
    }
}
