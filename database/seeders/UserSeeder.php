<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserConnection;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(database_path('seeders/socialGraph.json'));
        $data = json_decode($json, true);

        foreach ($data as $user) {
            User::create([
                'firstName' => $user['firstName'],
                'surname' => $user['surname'],
                'age' => !empty($user['age']) ? $user['age'] : null,
                'gender' => $user['gender'],
            ]);
        }

        foreach ($data as $user) {
            foreach ($user['connections'] as $connection) {
                UserConnection::create([
                    'user_id' => $user['id'],
                    'friend_id' => $connection,
                ]);
            }
        }
    }
}
