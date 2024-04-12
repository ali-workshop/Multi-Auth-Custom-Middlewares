<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
///////////////insert a new user into the database and assign them a role, 
//////////////////the role value (0, 1, or 2) is what gets stored in the database.
//////////////// The accessor function then uses this stored value
//////////////// to determine which string representation to return when the role attribute is accessed on
// a model instance

#define an accessor
protected function role():Attribute{

return new Attribute(
// based on the order of the role it will be take the autorization 
// based on the below line 0 will be the user and 1 will be the admin and 2 will be the maneger because the index of the belwo array
//now if i change the array below i will get differnet autheriation 
get:fn($value)=>['User','Admin','Manager'][$value],
);


 }




}
