<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    protected $table = 'payee';
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
