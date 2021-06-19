<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['code', 'title', 'symbol'];

    public function expenses()
    {
        return $this->hasMany(Account::class);
    }

    public function account()
    {
        return $this->hasMany(Account::class);
    }

    public function exchangeRate()
    {
        return $this->hasMany(CurrencyExchangeRate::class);
    }
}
