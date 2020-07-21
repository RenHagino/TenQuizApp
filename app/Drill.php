<?php

//ネームスペース => Controller(Drills)で use App\Drill; として呼び出す
namespace App;

use Illuminate\Database\Eloquent\Model;

//ドリルのモデルを定義
class Drill extends Model
{
    // fillableを使うと
    protected $fillable = [
        'title',
        'category_name',
        'problem0',
        'a_method0',
        'answer0',
        'a_method1',
        'problem1',
        'answer1',
        'a_method2',
        'problem2',
        'answer2',
        'a_method3',
        'problem3',
        'answer3',
        'a_method4',
        'problem4',
        'answer4',
        'a_method5',
        'problem5',
        'answer5',
        'a_method6',
        'problem6',
        'answer6',
        'a_method7',
        'problem7',
        'answer7',
        'a_method8',
        'problem8',
        'answer8',
        'a_method9',
        'problem9',
        'answer9',
    ];
}
