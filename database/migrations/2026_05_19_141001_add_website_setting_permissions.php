<?php

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;

class AddWebsiteSettingPermissions extends Migration
{
    private array $permissions = [
        'website_setting_access',
        'website_setting_edit',
    ];

    public function up()
    {
        foreach ($this->permissions as $title) {
            Permission::firstOrCreate(['title' => $title]);
        }

        $adminRole = Role::find(1);

        if ($adminRole) {
            $permissionIds = Permission::whereIn('title', $this->permissions)->pluck('id');
            $adminRole->permissions()->syncWithoutDetaching($permissionIds);
        }
    }

    public function down()
    {
        $permissionIds = Permission::whereIn('title', $this->permissions)->pluck('id');

        foreach (Role::all() as $role) {
            $role->permissions()->detach($permissionIds);
        }

        Permission::whereIn('title', $this->permissions)->delete();
    }
}
