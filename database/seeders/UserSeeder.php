<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = Role::where('name', 'ADMIN')->first();
        //
        DB::table('users')->insert([
          [ 
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'role_id' => $role->id,
            'password' => Hash::make('admin@123'),
          ],
      ]);
    }
}
