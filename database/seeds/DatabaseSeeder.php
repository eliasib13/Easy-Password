<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\PasswordRegister;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('password_registers')->delete();
        DB::table('users')->delete();

        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin')
            ],
            [
                'name' => 'User Test',
                'email' => 'usertest@email.com',
                'password' => bcrypt('usertest')
            ]
        ];

        foreach ($users as $user) {
            User::Create($user);
        }

        $passwordRegisters = [
            [
                'user_id' => User::where('email', '=', 'admin@email.com')->first()->id,
                'name' => 'My Social Network',
                'password' => encrypt('myPassword')
            ],
            [
                'user_id' => User::where('email', '=', 'admin@email.com')->first()->id,
                'name' => 'My YouTube',
                'password' => encrypt('myYouTubePassword')
            ],
            [
                'user_id' => User::where('email', '=', 'usertest@email.com')->first()->id,
                'name' => 'My LinkedIn',
                'password' => encrypt('myLinkedInPassword')
            ],
            [
                'user_id' => User::where('email', '=', 'usertest@email.com')->first()->id,
                'name' => 'My Facebook',
                'password' => encrypt('myFacebookPassword')
            ],
            [
                'user_id' => User::where('email', '=', 'usertest@email.com')->first()->id,
                'name' => 'My Twitter',
                'password' => encrypt('myTwitterPassword')
            ]
        ];

        foreach ($passwordRegisters as $register) {
            PasswordRegister::Create($register);
        }
    }
}
