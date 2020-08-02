<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drill;
use Illuminate\Support\Facades\Auth; 
class MypageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        return view('mypage');
    }

    //自分が投稿したドリルのみ表示
    public function mydrill(){
        $user_id = Auth::id();

        $drills = Drill::where('user_id', $user_id)->get();

        return view('drills.mydrill', ['drills'=> $drills]);
    }    
    
    public function myfav()
    {
        // GETパラメータが数字かどうかをチェックする
        //if(!ctype_digit()){
            //return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        //}
        return('favdrill');
    }
}
