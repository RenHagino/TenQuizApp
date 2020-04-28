<?php
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\FAcades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usersテーブルにサンプルユーザーを挿入する
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'sample_user01',
            'email' => 'sample_email01@gmail.com',
            'password' => 'pass0001',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
