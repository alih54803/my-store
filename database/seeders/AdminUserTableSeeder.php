<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user = User::create([
        //     'name' => 'admin',
        //     'lname'=>'admin',
        //     'email' => 'superadmin@admin.com',
        //     'password' => bcrypt('password'),

        // ]);
$user=User::find(10);
        // $role = Role::create(['name' => 'super_admin']);
$role=Role::find(4);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
