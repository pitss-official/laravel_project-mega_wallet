<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'balance','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getCurrentAPIUser()
    {
        try{
            $userObject=Auth::guard('api')->user();
            return [
                'id'=>$userObject->id,
                'name'=>$userObject->name,
                'isAdmin'=>$userObject->isAdmin,
                'balance'=>$userObject->balance,
                'email'=>$userObject->email,
            ];}
        catch (\Exception $e)
        {
            die("Invalid Session");
        }
    }
}
