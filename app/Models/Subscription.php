<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $UUID
 * @property integer $APPID
 * @property array $status
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
