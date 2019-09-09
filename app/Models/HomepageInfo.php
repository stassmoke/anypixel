<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class HomepageInfo
 * @package App\Models
 * @property int intInfoID
 * @property string varImgUrl
 * @property string varType
 * @property string varVideoUrl
 */
class HomepageInfo extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'intInfoID';

    public const VIDEO_TYPE = 'video';
    public const IMAGE_TYPE = 'image';
}
