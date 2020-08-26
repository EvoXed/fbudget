<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CurrencyExchangeRate extends Model
{
    protected $table = 'currency_exchange_rate';

    protected $fillable = [
        'from_currency_id',
        'to_currency_id',
        'rate_date',
        'rate'
    ];

    public function fromCurrency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function toCurrency()
    {
        return $this->belongsTo('App\Currency');
    }
}
