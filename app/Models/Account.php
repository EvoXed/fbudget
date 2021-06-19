<?php

namespace App\Models;

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
        return $this->hasMany(Transaction::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }

    public function balance()
    {
        return $this->hasOne(RunningBalance::class);
    }
}
