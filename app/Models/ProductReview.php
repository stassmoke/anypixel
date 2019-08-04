<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductReview
 * @package App\Models
 * @property int intReviewID
 * @property int intProductID
 * @property int intRating
 * @property string varName
 * @property string varComment
 * @property string created_at
 * @property string updated_at
 */
class ProductReview extends Model
{
    protected $primaryKey = 'intReviewID';
}
