<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'login', 'name', 'email', 'password', 'is_activated'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function account()
    {
        return $this->hasMany(Account::class);
    }

    public function category()
    {
        $this->hasMany(Category::class);
    }

    public function payee()
    {
        $this->hasMany(Payee::class);
    }
}
