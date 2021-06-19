<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $transaction)
 */
class Transaction extends Model
{
    protected $fillable = [
        'from_account_id',
        'to_account_id',
        'category_id',
        'user_id',
        'payee_id',
        'note',
        'from_amount',
        'date',
        'to_amount',
        'status'
    ];

    protected $dates = ['date'];

    public function from_account()
    {
        return $this->belongsTo(Account::class, 'from_account_id');
    }

    public function to_account()
    {
        return $this->belongsTo(Account::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payee()
    {
        return $this->belongsTo(Payee::class);
    }

    public function balance()
    {
        return $this->hasOne(RunningBalance::class);
    }
}
