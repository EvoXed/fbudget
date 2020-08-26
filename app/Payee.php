<?php

namespace App;

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
        return $this->hasMany('App\Transaction');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
