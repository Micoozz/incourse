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
        		'title' => '杭州第一中学',
        		'username' => 'hangzhouyizhong',
        		'password' => bcrypt('123456'),
        	]);
        DB::table('employee')->insert([
        		'name' => '柯元凯',
        		'school_id' => 1,
        		'username' => 'keyuankai',
        		'password' => bcrypt('123456'),
        	]);
        DB::table('student')->insert([
        		'name' => '郑泽果',
        		'school_id' => 1,
        		'class_id' => 1,
        		'username' => 'zhengzeguo',
        		'password' => bcrypt('123456'),
        		'stu_number' => 1,
        	]);
    }
}
