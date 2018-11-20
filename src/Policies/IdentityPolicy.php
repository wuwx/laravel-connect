<?php

namespace Wuwx\LaravelConnect\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IdentityPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return false;
    }
}
