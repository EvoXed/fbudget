<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Debug\Tests\testHeader;

class Expense extends Model
{
    protected $fillable = [
        'date', 'purpose_id', 'amount', 'user_id', 'account_id'
    ];
    protected $dates = ['date'];

    public function purpose()
    {
        return $this->belongsTo('App\Purpose');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
