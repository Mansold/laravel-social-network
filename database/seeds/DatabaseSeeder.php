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
        $users = factory(App\User::class)->times(12)->create();
        
        $users->each(function(App\User $user) use ($users) {
            factory(App\Message::class)->times(8)->create([
                'user_id' => $user->id,
            ]);

            $user->follows()->sync(
                $users->random(5)
            );
        });
        
    }
}
