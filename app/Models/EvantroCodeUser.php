<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EvantroCodeUser
 * @package App\Models
 * @property int intCodeUserID
 * @property int intCodeID
 * @property string varUserName
 * @property string varEmail
 * @property string created_at
 * @property string updated_at
 */
class EvantroCodeUser extends Model
{
    protected $primaryKey = 'intCodeUserID';
}
