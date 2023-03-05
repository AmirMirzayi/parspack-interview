<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Platform
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $retry_after_hours
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\App> $Apps
 * @property-read int|null $apps_count
 * @method static \Database\Factories\PlatformFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Platform newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform query()
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereRetryAfterHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Platform whereUrl($value)
 * @mixin \Eloquent
 */
class Platform extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Apps(){
        return $this->hasMany(App::class);
    }
}
