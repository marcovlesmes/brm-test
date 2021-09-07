<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'info.create']);
        Permission::create(['name' => 'info.read']);
        Permission::create(['name' => 'info.update']);
        Permission::create(['name' => 'info.delete']);
        Permission::create(['name' => 'images.create']);
        Permission::create(['name' => 'images.read']);
        Permission::create(['name' => 'images.update']);
        Permission::create(['name' => 'images.delete']);
    }
}
