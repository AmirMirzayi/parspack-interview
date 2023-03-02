<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $retry_after_hours
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
