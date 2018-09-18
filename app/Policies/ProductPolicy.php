<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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

    // public function before($user, $ability){
    //     return $user->id == 2;
    // }

    public function delete(User $user){
        return $user->level_up === 2;
    }
}
