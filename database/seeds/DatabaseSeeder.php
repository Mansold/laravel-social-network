<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class)->times(5)->create()->each(function(App\User $user) {
            factory(App\Message::class)->times(5)->create([
                'user_id' => $user->id,
            ]);
        });
        
    }
}
