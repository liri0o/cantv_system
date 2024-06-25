<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*  $role1 = Role::create(['name' => 'admin']);
         $role2 = Role::create(['name' => 'mod']);

        User::factory()->create([
            'name' => 'Administrador prime',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('admin'); 

        User::factory()->create([
            'name' => 'Moderador prime',
            'email' => 'moderator@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('mod');  

        User::factory()->create([
            'name' => 'Usuario prime',
            'email' => 'userz@gmail.com',
            'password' => bcrypt('123456789')
        ]);*/
    }
}
