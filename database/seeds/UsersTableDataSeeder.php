<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1; $i++) { 
            Admin::create([
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password')
            ]);
        }
    }
}
