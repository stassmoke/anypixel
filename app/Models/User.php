<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App\Models
 * @property int intUserID
 * @property int intRoleID
 * @property string varName
 * @property string varEmail
 * @property string varPassword
 * @property string createdAt
 * @property string updatedAt
 */
class User extends Authenticatable
{
    protected $primaryKey = 'intUserID';

    public const ADMIN_ROLE = 1;
}
