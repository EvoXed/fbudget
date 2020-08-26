<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $userId)
 */
class Account extends Model
{
    protected $fillable =
        [
            'title',
            'total_amount',
            'last_transaction',
            'currency_id',
            'account_type_id',
            'issuer',
            'is_active',
            'is_include_into_totals',
            'total_limit',
            'card_issuer',
            'user_id'
        ];

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function type()
    {
        return $this->belongsTo('App\AccountType', 'account_type_id');
    }

    public function balance()
    {
        return $this->hasOne('App\RunningBalance');
    }
}
