<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ドリルテーブルにインサート
        DB::table('drills')->insert([
            'title' => 'testTitle',
            'category_name' => 'testCategory',
            'problem0' => 'pro0',
            'answer0' => 'ans0',
            'problem1' => 'pro1',
            'answer1' => 'ans1',
            'problem2' => 'pro2',
            'answer2' => 'ans2',
            'problem3' => 'pro3',
            'answer3' => 'ans3',
            'problem4' => 'pro4',
            'answer4' => 'ans4',
            'problem5' => 'pro5',
            'answer5' => 'ans5',
            'problem6' => 'pro6',
            'answer6' => 'ans6',
            'problem7' => 'pro7',
            'answer7' => 'ans7',
            'problem8' => 'pro8',
            'answer8' => 'ans8',
            'problem9' => 'pro9',
            'answer9' => 'ans9',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
