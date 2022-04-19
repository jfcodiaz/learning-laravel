<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersRoles extends Migration
{

    public function up()
    {
        /** @var  Role $admin */
        $admin = Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'User']);

        Permission::create(['name' => 'destroy_product']);
        $admin->givePermissionTo('destroy_product');
    }

    public function down()
    {
        try{
            $administrator = Role::findByName('Administrator');
            $administrator->delete();
        } catch(\Exception $ex) {}

        try{
            $user = Role::findByName('User');
            $user->delete();
        } catch(\Exception $ex) {}

        try{
            $user = Permission::findByName('destroy_product');
            $user->delete();
        } catch(\Exception $ex) {}
    }
}
