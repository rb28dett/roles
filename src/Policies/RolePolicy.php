<?php

namespace RB28DETT\Roles\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use RB28DETT\Users\Models\User;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Filters the authoritzation.
     *
     * @param mixed $user
     * @param mixed $ability
     */
    public function before($user, $ability)
    {
        if (User::findOrFail($user->id)->superAdmin()) {
            return true;
        }
    }

    /**
     * Determine if the current user can access roles module.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function access($user)
    {
        return User::findOrFail($user->id)->hasPermission('rb28dett::roles.access');
    }

    /**
     * Determine if the current user can create roles.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function create($user)
    {
        return User::findOrFail($user->id)->hasPermission('rb28dett::roles.create');
    }

    /**
     * Determine if the current user can update roles.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function update($user, $role)
    {
        return User::findOrFail($user->id)->hasPermission('rb28dett::roles.update');
    }

    /**
     * Determine if the current user can manage permissions from roles.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function manage_permissions($user, $role)
    {
        return User::findOrFail($user->id)->hasPermission('rb28dett::roles.permissions');
    }

    /**
     * Determine if the current user can delete roles.
     *
     * @param mixed $user
     *
     * @return bool
     */
    public function delete($user, $role)
    {
        return User::findOrFail($user->id)->hasPermission('rb28dett::roles.delete');
    }
}
