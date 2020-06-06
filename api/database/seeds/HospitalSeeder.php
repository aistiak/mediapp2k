<?php

use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hospitals')->insert([
            'id' => 1 ,
            'name' => 'admin' ,
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::where('slug','=','super_admin')->first()->id ,
        ]);
        // factory(\App\User::class,10)->create();
    }
}
