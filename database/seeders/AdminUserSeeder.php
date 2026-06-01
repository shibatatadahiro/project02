<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => '管理者',
            'email' => 'admin@candy-cc.com',
            'password' => Hash::make('Admin1234'), // ← 必要なら変更
            'role' => 'admin',
        ]);
    }
}
