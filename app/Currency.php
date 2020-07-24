<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['code', 'title', 'symbol'];

    public function expenses()
    {
        return $this->hasOne('App\Account');
    }
}
