<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
       
        $roles = ['admin', 'editor', 'user'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
             // Kreiranje korisnika i dodeljivanje rola
             $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'), // Postavi lozinku po želji
            ]);
            $admin->assignRole('admin');
    
            $editor = User::create([
                'name' => 'Editor User',
                'email' => 'editor@example.com',
                'password' => Hash::make('editor'), // Postavi lozinku po želji
            ]);
            $editor->assignRole('editor');
    
            $user = User::create([
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('user'), // Postavi lozinku po želji
            ]);
            $user->assignRole('user');
    }
}
