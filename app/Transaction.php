<?php

namespace App;

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
        return $this->belongsTo('App\Account', 'from_account_id');
    }

    public function to_account()
    {
        return $this->belongsTo('App\Account');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function payee()
    {
        return $this->belongsTo('App\Payee');
    }

    public function balance()
    {
        return $this->hasOne('App\RunningBalance');
    }
}
