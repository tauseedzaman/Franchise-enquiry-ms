<?php

namespace Database\Seeders;

use App\Models\agents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() === 0) {
            $now = Carbon::now();
        \App\Models\User::create([
            'name' => "Admin",
            'email' => "admin@test.com",
            'email_verified_at' => now(),
            'is_admin' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'created_at' => $now,
            'updated_at' => $now,

        ]);
    }
        $this->call([
            StatusesTableSeeder::class,
            rolesSeeder::class,
        ]);
        // for ($i=1; $i <= 8 ; $i++) {
        //     agents::create([
        //         'user_id' => 1,
        //         "role_id" => $i,
        //         'created_at' => $now,
        //         'updated_at' => $now,
        //     ]);
        // }
        // \App\Models\User::factory(10)->create();
    }
}
