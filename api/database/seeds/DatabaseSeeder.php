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
        // $this->call(UserTableSeeder::class);
        // //$this->call(ContactTableSeeder::class);
        // $this->call(ParentAccountSeeder::class);
        // $this->call(AccountTypeSeeder::class);
        // $this->call(AccountSeeder::class);
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('secret'),
        ]);
        $this->call(HospitalSeeder::class);
        $this->call(DoctorSeeder::class);


    }
}
