<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        $role2 = Role::create(['name' => 'admin']);
        $role3 = Role::create(['name' => 'mod']); 
        $role4 = Role::create(['name' => 'viewer']); 
        
        
        \App\Models\User::factory()->create([
            'name' => 'Administrador',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('admin');

        \App\Models\User::factory()->create([
            'name' => 'Moderator user',
            'email' => 'moderator@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('mod'); 

        \App\Models\User::factory()->create([
            'name' => 'Common user',
            'email' => 'userz@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('viewer');
/* 
        \App\Models\User::factory(30)->create(); */
    }
}
