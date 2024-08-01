<?php

namespace Database\Seeders;

use App\Library\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "admin";
        $user->surname = "admin";
        $user->username = "superadmin";
        $user->type = UserType::ADMIN->value;
        $user->email = "superadmin@admin.com";
        $user->password = Hash::make("Qazwsx123!");
        $user->phone = "5998887766";
        $user->save();
    }
}
