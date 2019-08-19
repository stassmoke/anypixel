<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscriber
 * @package App\Models
 * @property int intSubscriberID
 * @property string varEmail
 * @property string created_at
 * @property string updated_at
 */
class Subscriber extends Model
{
    protected $primaryKey = 'intSubscriberID';
}
