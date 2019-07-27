<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App\Models
 * @property int intTagID
 * @property string varName
 * @property string varLink
 * @property int intOrder
 * @property int isEnabled
 * @property string created_at
 * @property string updated_at
 */
class Tag extends Model
{
    protected $primaryKey = 'intTagID';
}
