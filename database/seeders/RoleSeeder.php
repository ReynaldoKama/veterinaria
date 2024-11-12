<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $veterinario = Role::create(['name' => 'veterinario']);
        $cliente = Role::create(['name' => 'cliente']);

        Permission::create(['name' => 'home'])->syncRoles([$admin, $veterinario, $cliente]);
        Permission::create(['name' => 'admin.home'])->syncRoles([$admin]);

        Permission::create(['name' => 'admin.products.index'])->syncRoles([$admin, $veterinario, $cliente]);
        Permission::create(['name' => 'admin.products.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.products.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.products.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.products.destroy'])->syncRoles([$admin]);
        
        // Permission::create(['name' => 'admin.users.index'])->syncRoles([$admin]);
        // Permission::create(['name' => 'admin.users.create'])->syncRoles([$admin]);
        // Permission::create(['name' => 'admin.users.edit'])->syncRoles([$admin]);
        // Permission::create(['name' => 'admin.users.update'])->syncRoles([$admin]);
        // Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$admin]);
        

    }
}
