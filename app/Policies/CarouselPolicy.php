<?php

namespace App\Policies;

use App\Models\User;

class CarouselPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return $user->is_admin;
    }
}
