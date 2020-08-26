<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $userId)
 */
class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'title',
        'is_active',
        'user_id'
    ];

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
