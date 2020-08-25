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
        // ADMIN
        $admin = User::create([
            'nip' => '198507232005021001',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('admin');


        // KEPALA SEKOLAH
        $kepalasekolah = User::create([
            'nip' => '199008242016062001',
            'name' => 'Kepala Sekolah',
            'email' => 'kepalasekolah@email.com',
            'password' => bcrypt('kepsek123')
        ]);
        $kepalasekolah->assignRole('kepalasekolah');


        // KURIKULUM
        $kurikulum = User::create([
            'nip' => '197703252009012001',
            'name' => 'Kurikulum',
            'email' => 'kurikulum@email.com',
            'password' => bcrypt('kurikulum123')
        ]);
        $kurikulum->assignRole('kurikulum');


        // GURU
        $guru1 = User::create([
            'nip' => '199504222018011001',
            'name' => 'Guru 1',
            'email' => 'guru@email.com',
            'password' => bcrypt('guru123')
        ]);
        $guru1->assignRole('guru');

        $guru2 = User::create([
            'nip' => '199605242019022001',
            'name' => 'Guru 2',
            'email' => 'guru2@email.com',
            'password' => bcrypt('guru123')
        ]);
        $guru2->assignRole('guru');
        
        $guru3 = User::create([
            'nip' => '199706262020031001',
            'name' => 'Guru 3',
            'email' => 'guru3@email.com',
            'password' => bcrypt('guru123')
        ]);
        $guru3->assignRole('guru');


        // SUPERVISOR
        $supervisor = User::create([
            'nip' => '198909102020071001',
            'name' => 'Supervisor',
            'email' => 'supervisor@email.com',
            'password' => bcrypt('supervisor123')
        ]);
        $supervisor->assignRole('supervisor');
    }
}
