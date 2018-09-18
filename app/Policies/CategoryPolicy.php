<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    public function before(User $user){
        if($user->level_up == 2){
            return true;
        }
    }

    public function create(User $user){
        if($user->level_up == 1){
            return true;
        }
    }

}
