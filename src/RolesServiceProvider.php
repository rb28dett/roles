<?php

namespace RB28DETT\Roles;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use RB28DETT\Permissions\PermissionsChecker;
use RB28DETT\Roles\Models\Role;
use RB28DETT\Roles\Policies\RolePolicy;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RolePolicy::class,
    ];

    /**
     * The mandatory permissions for the module.
     *
     * @var array
     */
    protected $permissions = [
        [
            'name' => 'Roles Access',
            'slug' => 'rb28dett::roles.access',
            'desc' => 'Grants access to rb28dett/roles module',
        ],
        [
            'name' => 'Create Roles',
            'slug' => 'rb28dett::roles.create',
            'desc' => 'Allows creating roles',
        ],
        [
            'name' => 'Update Roles',
            'slug' => 'rb28dett::roles.update',
            'desc' => 'Allows updating roles',
        ],
        [
            'name' => 'View Roles',
            'slug' => 'rb28dett::roles.view',
            'desc' => 'Allows previewing roles',
        ],
        [
            'name' => 'Manage Role Permissions',
            'slug' => 'rb28dett::roles.permissions',
            'desc' => 'Allows mange permissions of roles',
        ],
        [
            'name' => 'Delete Roles',
            'slug' => 'rb28dett::roles.delete',
            'desc' => 'Allows delete roles',
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->loadViewsFrom(__DIR__.'/Views', 'rb28dett_roles');

        $this->loadTranslationsFrom(__DIR__.'/Translations', 'rb28dett_roles');

        if (!$this->app->routesAreCached()) {
            require __DIR__.'/Routes/web.php';
        }

        $this->loadMigrationsFrom(__DIR__.'/Migrations');

        // Make sure the permissions are OK
        PermissionsChecker::check($this->permissions);
    }

    /**
     * I cheated this comes from the AuthServiceProvider extended by the App\Providers\AuthServiceProvider.
     *
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
