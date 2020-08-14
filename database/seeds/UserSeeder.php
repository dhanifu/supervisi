<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nip' => '198507232005021001',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('admin');

        $kepalasekolah = User::create([
            'nip' => '199008242016062001',
            'name' => 'saya Kepala Sekolah',
            'email' => 'kepalasekolah@email.com',
            'password' => bcrypt('kepsek123')
        ]);
        $kepalasekolah->assignRole('kepalasekolah');

        $kurikulum = User::create([
            'nip' => '197703252009012001',
            'name' => 'saya Kurikulum',
            'email' => 'kurikulum@email.com',
            'password' => bcrypt('kurikulum123')
        ]);
        $kurikulum->assignRole('kurikulum');

        $guru = User::create([
            'nip' => '199504222018011001',
            'name' => 'saya Guru',
            'email' => 'guru@email.com',
            'password' => bcrypt('guru123')
        ]);
        $guru->assignRole('guru');
        
        $supervisor = User::create([
            'nip' => '198909102020071001',
            'name' => 'saya Supervisor',
            'email' => 'supervisor@email.com',
            'password' => bcrypt('supervisor123')
        ]);
        $supervisor->assignRole('supervisor');
    }
}
