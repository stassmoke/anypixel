<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AfterEffectsPack
 * @package App\Models
 * @property int intPackID
 * @property int intSort
 * @property string varName
 * @property string varImg
 * @property string varDescription
 * @property string varLink
 * @property int isEnabled
 * @property string created_at
 * @property string updated_at
 */
class AfterEffectsPack extends Model
{
    protected $primaryKey = 'intPackID';
}
