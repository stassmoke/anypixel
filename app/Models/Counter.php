<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Counter
 * @package App\Models
 * @property int intCountID
 * @property string varName
 * @property string varAlias
 * @property int intValue
 * @property int isEnabled
 * @property int intSort
 */
class Counter extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'intCountID';

    public const COUNTRY_ALIAS = 'country';
    public const SALES_ALIAS = 'sales';
    public const PROJECTS_ALIAS = 'projects';
}
