<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('post')->delete();

        factory(App\Post::class, 8)->create();

        User::create([
            'name'      => 'adam',
            'email'     => 'adam@email.com',
            'password'  => bcrypt('aaaaaa')
        ]);
    }
}
