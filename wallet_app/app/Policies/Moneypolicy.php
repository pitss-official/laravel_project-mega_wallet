<?php

namespace App\Policies;

use App\Money;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Moneypolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->isAdmin or !$user->isAdmin){
            return true;
        }
    }

    public function manage(User $user){
        return true;
    }

    /**
     * Determine whether the user can view any money.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the money.
     *
     * @param  \App\User  $user
     * @param  \App\Money  $money
     * @return mixed
     */
    public function view(User $user, Money $money)
    {
        //
    }

    /**
     * Determine whether the user can create money.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the money.
     *
     * @param  \App\User  $user
     * @param  \App\Money  $money
     * @return mixed
     */
    public function update(User $user, Money $money)
    {
        //
    }

    /**
     * Determine whether the user can delete the money.
     *
     * @param  \App\User  $user
     * @param  \App\Money  $money
     * @return mixed
     */
    public function delete(User $user, Money $money)
    {
        //
    }

    /**
     * Determine whether the user can restore the money.
     *
     * @param  \App\User  $user
     * @param  \App\Money  $money
     * @return mixed
     */
    public function restore(User $user, Money $money)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the money.
     *
     * @param  \App\User  $user
     * @param  \App\Money  $money
     * @return mixed
     */
    public function forceDelete(User $user, Money $money)
    {
        //
    }
}
