<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Orderlist;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderlistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the orderlist can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the orderlist can view the model.
     */
    public function view(User $user, Orderlist $model): bool
    {
        return true;
    }

    /**
     * Determine whether the orderlist can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the orderlist can update the model.
     */
    public function update(User $user, Orderlist $model): bool
    {
        return true;
    }

    /**
     * Determine whether the orderlist can delete the model.
     */
    public function delete(User $user, Orderlist $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the orderlist can restore the model.
     */
    public function restore(User $user, Orderlist $model): bool
    {
        return false;
    }

    /**
     * Determine whether the orderlist can permanently delete the model.
     */
    public function forceDelete(User $user, Orderlist $model): bool
    {
        return false;
    }
}
