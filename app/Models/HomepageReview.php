<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HomepageReview
 * @package App\Models
 * @property int intReviewID
 * @property string varName
 * @property string varLink
 * @property string varText
 * @property string varPosition
 * @property int intOrder
 * @property int isEnabled
 */
class HomepageReview extends Model
{
    protected $primaryKey = 'intReviewID';
}
