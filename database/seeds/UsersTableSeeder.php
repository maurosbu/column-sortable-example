<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->detail()->save(factory(App\UserDetail::class)->make(['user_id' => $u->id]));
            $u->projects()->saveMany(factory(App\Project::class, rand(5, 50))->make(['user_id' => $u->id]));
        });
    }
}
