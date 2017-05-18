<?php

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
        // $this->call(UsersTableSeeder::class);
        DB::table('school')->insert([
        		'title' => '杭州第二中学',
        		'username' => 'hangzhouerzhong',
        		'password' => bcrypt('hz123123'),
        	]);
    }
}
