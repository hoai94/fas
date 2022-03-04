<?php

namespace App\Models;

// use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'phone',
        'password',
        'address',
        'email',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'customer_id', 'id');
    }
}
