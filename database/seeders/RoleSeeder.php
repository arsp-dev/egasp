<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'encode isolate']);
        Permission::create(['name' => 'view isolate']);
        Permission::create(['name' => 'edit isolate']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'see all isolates']);


        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('encode isolate');
        $admin->givePermissionTo('view isolate');
        $admin->givePermissionTo('edit isolate');
        $admin->givePermissionTo('create roles');
        $admin->givePermissionTo('create permissions');

        $sentinel_site = Role::create(['name' => 'sentinel_site']);
        $sentinel_site->givePermissionTo('encode isolate');
        $sentinel_site->givePermissionTo('view isolate');
        $sentinel_site->givePermissionTo('edit isolate');

        $super_admin = Role::create(['name' => 'Super-Admin']);
       
       
       $s_admin = User::create([
        'name' => 'ARSP',
        'email' => 'dev@arsp.com.ph',
        'password' => Hash::make('@rsp@rsp1111'),
        ]);

        $s_admin->hospital()->create([
            'hospital_name' => 'Research Institute for Tropical Medicine'
            ]);
       $s_admin->assignRole($super_admin);

       $laboratory = User::create([
        'name' => 'ARSP Laboratory',
        'email' => 'laboratory@arsp.com.ph',
        'password' => Hash::make('l0cal241'),
         ]);
    
        $laboratory->hospital()->create([
        'hospital_name' => 'Research Institute for Tropical Medicine'
        ]);

        $laboratory->assignRole($admin);

       $dmc = User::create([
        'name' => 'DMC',
        'email' => 'dmc@arsp.com.ph',
        'password' => Hash::make('@rsp@rsp1111'),
        ]);

        $dmc->assignRole($sentinel_site);

        $dmc->hospital()->create([
            'hospital_name' => 'Southern Philippines Medical Center'
        ]);


        $vsm = User::create([
            'name' => 'DMC',
            'email' => 'vsm@arsp.com.ph',
            'password' => Hash::make('@rsp@rsp1111'),
            ]);
    
            $vsm->assignRole($sentinel_site);
    
            $vsm->hospital()->create([
                'hospital_name' => 'Vicente Sotto Memorial Medical Center'
            ]);

        
        

    }
}
