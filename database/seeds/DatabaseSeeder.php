<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
    }
}

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->delete();
        for($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->generateUrl();
            $user->generateCode();
            $user->save();
            $this->command->info('Generated ' . $user->url . '/' . $user->code);
        }
    }
}
