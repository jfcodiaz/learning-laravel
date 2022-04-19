<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {


        $this->createUnique('admin@servlocal.com', 'Administrador', 'Administrator');
        $this->createUnique('admin2@servlocal.com', 'Administrador', 'Administrator');
        $this->createUnique('user1@gmail.com', 'Usuario 1', 'User');
        $this->createUnique('user2@gmail.com', 'Usuario 2', 'User');
        User::factory(20)->create()->each(function (User $user){
            $user->assignRole('Administrator');
        });

    }

    private function createUnique($email, $name, $rol)
    {
        $user = User::query()->where('email', $email)->first();
        if($user == null) {
            User::factory(1, [
                'email' => $email,
                'name' => $name
            ])->create()->each(function (User $user) use ($rol) {
                $user->assignRole($rol);
            });
        }
    }
}
