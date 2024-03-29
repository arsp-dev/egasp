<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Hospital;
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
        Hospital::create(['hospital_name' => 'Research Institute for Tropical Medicine','hospital_code' => 'dev']); // 1
        Hospital::create(['hospital_name' => 'Research Institute for Tropical Medicine','hospital_code' => 'ARSLAB']); // 2
        Hospital::create(['hospital_name' => 'Southern Philippines Medical Center','hospital_code' => 'DMC']); // 3
        Hospital::create(['hospital_name' => 'Vicente Sotto Memorial Medical Center','hospital_code' => 'VSM']); // 4

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
        'name' => 'ARSP DEV',
        'email' => 'dev@arsp.com.ph',
        'password' => Hash::make('@rsp@rsp1111'),
        ]);

        $s_admin->personnel()->create([
            'hospital_id' => 1,
            ]);
       $s_admin->assignRole($super_admin);

       $laboratory = User::create([
        'name' => 'ARSP Laboratory',
        'email' => 'laboratory@arsp.com.ph',
        'password' => Hash::make('l0cal241'),
         ]);
    
        $laboratory->personnel()->create([
        'hospital_id' => 2,
        ]);

        $laboratory->assignRole($admin);

       $dmc = User::create([
        'name' => 'DMC',
        'email' => 'dmc@arsp.com.ph',
        'password' => Hash::make('@rsp@rsp1111'),
        ]);

        $dmc->assignRole($sentinel_site);

        $dmc->personnel()->create([
            'hospital_id' => 3,
        ]);


        $vsm = User::create([
            'name' => 'VSM',
            'email' => 'vsm@arsp.com.ph',
            'password' => Hash::make('@rsp@rsp1111'),
            ]);
    
            $vsm->assignRole($sentinel_site);
    
            $vsm->personnel()->create([
                'hospital_id' => 4,
            ]);

        
        

    }
}
