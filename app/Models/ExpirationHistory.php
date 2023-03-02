<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Illuminate\Support\Carbon $at_date
 * @property integer $expired_count
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
