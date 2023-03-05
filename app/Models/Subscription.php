<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Subscription
 *
 * @property integer $UUID
 * @property integer $APPID
 * @property array $status
 * @property int $UID User's ID
 * @property-read \App\Models\App|null $App
 * @property-read \App\Models\User|null $User
 * @method static \Database\Factories\SubscriptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereAPPID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscription whereUID($value)
 * @mixin \Eloquent
 */
class Subscription extends Model
{
    use HasFactory;
    protected $primaryKey = ['UID', 'APPID'];
    public $incrementing = false;
    public $timestamps = false;
    public const STATUSES = [
        'active',
        'expired',
        'pending',
    ];

    public function User(){
        return $this->belongsTo(User::class,'UID','id');
    }

    public function App(){
        return $this->belongsTo(App::class,'APPID','id');
    }
}
