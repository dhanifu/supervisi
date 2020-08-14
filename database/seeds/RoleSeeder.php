<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'kepalasekolah',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'kurikulum',
            'guard_name' => 'web'
        ]);
        
        Role::create([
            'name' => 'guru',
            'guard_name' => 'web'
        ]);
        
        Role::create([
            'name' => 'supervisor',
            'guard_name' => 'web'
        ]);
    }
}
