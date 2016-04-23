<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->delete();

        $users = array(
            ['id' => 1, 'first_name' => 'Test', 'last_name' => 'ZeroUnu', 'email' => 'test01@tripto.ro', 'password' => Hash::make('test1234')],
            ['id' => 2, 'first_name' => 'Test', 'last_name' => 'ZeroDoi', 'email' => 'test02@tripto.ro', 'password' => Hash::make('test1234')],
            ['id' => 3, 'first_name' => 'Test', 'last_name' => 'ZeroTrei', 'email' => 'test03@tripto.ro', 'password' => Hash::make('test1234')],
            ['id' => 4, 'first_name' => 'Test', 'last_name' => 'ZeroPatru', 'email' => 'test04@tripto.ro', 'password' => Hash::make('test1234')],
            ['id' => 5, 'first_name' => 'Test', 'last_name' => 'ZeroCinci', 'email' => 'test05@tripto.ro', 'password' => Hash::make('test1234')],
        );

        // Loop through each user above and create the record for them in the database
        foreach ($users as $user)
        {
            User::create($user);
        }

        Model::reguard();
    }
}
