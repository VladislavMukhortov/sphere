<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  User  $user
     * @return void
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  User  $user
     * @return void
     */
    public function updated(User $user): void
    {
        $user->updateQuietly([
            'full_name' => $user->first_name . ($user->last_name ? ' ' . $user->last_name : '')
        ]);
        $user->searchable();
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  User  $user
     * @return void
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  User  $user
     * @return void
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
