<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Social
 * @package App\Models
 * @property int intSocialID
 * @property string varName
 * @property string varIcon
 * @property string varLink
 * @property int intSort
 */
class Social extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'intSocialID';
}
