<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        //User::query()->delete();
        //User::truncate(); // IDもリセット

        $param = [
            [
                'name' => 'yas',
                'email' => 'bobo@yasbox.com',
                'email_verified_at' => now(),
                'password' => Hash::make('yasu0801'),
            ],
            [
                'name' => 'tokuda',
                'email' => 'tokuda@tokuda.com',
                'email_verified_at' => now(),
                'password' => Hash::make('tokuda'),
            ],
        ];

        User::insert($param);

        /* $User = new User([
            'name' => '管理者',
            'email' => 'bobo@yasbox.com',
            'email_verified_at' => now(),
            'password' => Hash::make('yasu0801'),
        ]);
        $User->save(); */

    }
}
