<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RunningBalance extends Model
{
    protected $table = 'running_balance';

    protected $fillable = [
        'account_id',
        'transaction_id',
        'balance'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
