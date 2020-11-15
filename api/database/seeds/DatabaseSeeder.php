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
        
        // DB::table('users')->insert([
        //     'name' => 'admin',
        //     'role_id' => 1 ,
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('secret'),
        // ]);
        // DB::table('activations')->insert([
        //     'user_id' => 1, 'completed' => 1 ,'code' => 1
        // ]);
        // $this->call(HospitalSeeder::class);
        $this->call(DoctorSeeder::class);
        // $this->call(PatientSeeder::class);


    }
}
