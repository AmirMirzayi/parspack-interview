<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ExpirationHistory
 *
 * @property string $at_date At the date
 * @property string $expired_count Total expired accounts
 * @property int $platform_id platform
 * @property-read \App\Models\Platform $Platform
 * @method static \Database\Factories\ExpirationHistoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationHistory whereAtDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationHistory whereExpiredCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationHistory wherePlatformId($value)
 * @mixin \Eloquent
 */
class ExpirationHistory extends Model
{
    use HasFactory;
    protected $primaryKey = ['at_date', 'platform_id'];
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'at_date',
        'expired_count',
        'platform_id'
    ];
    public function Platform(){
        return $this->belongsTo(Platform::class);
    }
}
