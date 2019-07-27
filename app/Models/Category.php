<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 * @property int intCatID
 * @property string varName
 * @property string varLink
 * @property int intOrder
 * @property int isEnabled
 * @property string created_at
 * @property string updated_at
 */
class Category extends Model
{
    protected $primaryKey = 'intCatID';
}
