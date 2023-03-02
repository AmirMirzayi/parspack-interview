<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property integer $platform_id
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
