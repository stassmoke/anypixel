<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EvantroCode
 * @package App\Models
 * @property int intCodeID
 * @property int intEvantroID
 * @property string varCode
 */
class EvantroCode extends Model
{
    protected $primaryKey = 'intCodeID';
}
