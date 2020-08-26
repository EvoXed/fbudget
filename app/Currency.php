<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['code', 'title', 'symbol'];

    public function expenses()
    {
        return $this->hasMany('App\Account');
    }

    public function account()
    {
        return $this->hasMany('App\Account');
    }

    public function exchangeRate()
    {
        return $this->hasMany('App\CurrencyExchangeRate');
    }
}
