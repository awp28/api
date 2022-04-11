<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::UpdateOrCreate(
            [
                'username' => 'admin'
            ],
            [
                'fullname' => 'Admin',
                'password' => 'admin12345'
            ]
        );
    }
}
