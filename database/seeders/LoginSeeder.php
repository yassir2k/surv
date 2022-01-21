<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        User::insert([
            'fullname' => 'Yassir Yahaya',
            'email'    => 'yyahaya@cac.gov.ng',
            'password' => bcrypt('@87.Com#'),
            'account_creation_token' => substr(bin2hex(random_bytes(100)), 0, 99),
            'password_reset_token' => substr(bin2hex(random_bytes(100)), 0, 99),
            'Role' => 'Admin',
       ]);
    }
}
