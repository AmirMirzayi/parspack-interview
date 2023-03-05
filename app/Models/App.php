<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\App
 *
 * @property int $id #
 * @property string $name App name
 * @property int $platform_id platform
 * @property-read \App\Models\Platform $Platform
 * @property-read \App\Models\Subscription|null $Subscriber
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subscription> $Subscriptions
 * @property-read int|null $subscriptions_count
 * @method static \Database\Factories\AppFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|App newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|App newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|App query()
 * @method static \Illuminate\Database\Eloquent\Builder|App whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|App whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|App wherePlatformId($value)
 * @mixin \Eloquent
 */
class App extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function Platform(){
        return $this->belongsTo(Platform::class);
    }

    public function Subscriptions(){
        return $this->hasMany(Subscription::class,'APPID','id');
    }

    public function Subscriber(){
        return $this->hasOne(Subscription::class,'APPID','id');
    }
}
