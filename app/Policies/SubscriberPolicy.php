<?php

namespace App\Policies;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('SUBSCRIBER_VIEW');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Subscriber $subscriber)
    {
        return $user->can('SUBSCRIBER_VIEW');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Subscriber $subscriber)
    {
        return $user->can('SUBSCRIBER_UPDATE');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Subscriber $subscriber)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Subscriber $subscriber)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Subscriber $subscriber)
    {
        //
    }
}
