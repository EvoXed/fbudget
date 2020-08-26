<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $fillable = [
        'title',
        'orig_name'
    ];

    public function account()
    {
        return $this->hasMany('App\Account');
    }
}
