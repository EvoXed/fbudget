<?php

namespace App\Models;

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
        return $this->hasMany(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
