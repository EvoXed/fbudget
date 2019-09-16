<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $fillable = [
        'purpose'
    ];

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
}
