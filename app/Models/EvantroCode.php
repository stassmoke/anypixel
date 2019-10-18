<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Class EvantroCode
 * @package App\Models
 * @property int intCodeID
 * @property int intEvantroID
 * @property string varCode
 * @property Collection|EvantroCodeUser[] users
 */
class EvantroCode extends Model
{
    protected $primaryKey = 'intCodeID';

    /**
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(EvantroCodeUser::class,'intCodeID','intCodeID');
    }
}
