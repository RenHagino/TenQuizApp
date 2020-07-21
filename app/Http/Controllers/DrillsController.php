<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Drill;

//クラス
class DrillsController extends Controller
{
    //ドリル登録画面を表示させる
    public function new(){
        return view('drills.new');
    }

    //ドリル新規登録
    public function create(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'category_name' => 'required|string|max:255',
            'problem0' => 'required|string|max:255',
            'answer0' => 'required|string|max:255',
            'problem1' => 'required|string|max:255',
            'answer1' => 'required|string|max:255',
            'problem2' => 'required|string|max:255',
            'answer2' => 'required|string|max:255',
            'problem3' => 'required|string|max:255',
            'answer3' => 'required|string|max:255',
            'problem4' => 'required|string|max:255',
            'answer4' => 'required|string|max:255',
            'problem5' => 'required|string|max:255',
            'answer5' => 'required|string|max:255',
            'problem6' => 'required|string|max:255',
            'answer6' => 'required|string|max:255',
            'problem7' => 'required|string|max:255',
            'answer7' => 'required|string|max:255',
            'problem8' => 'required|string|max:255',
            'answer8' => 'required|string|max:255',
            'problem9' => 'required|string|max:255',
            'answer9' => 'required|string|max:255',
        ]);

        //モデル(Drill)を使ってDBに登録する値をセット
        $drill = new Drill;

        // fillメソッドを使って一気にDBに登録する値をセット
        $drill->fill($request->all())->save();

        //登録後に登録完了のフラッシュメッセージを入れてリダイレクトする
        return redirect('/drills/new')->with('flash_message',__('Drill is Registered'));
    }

    //ドリル一覧取得(全ユーザー)
    public function index(){
        $drills = Drill::all();
        //ビューファイルをreutnで表示するときに'drills'にall()メソッドで入手した全てのドリルを入れる
        return view('drills.index', ['drills' => $drills]);
    }

    //ドリル
    public function lesson($id){

        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }
        
        //idを元にレッスンスタートしようとしているドリルを特定し$drillに格納する
        $drill = Drill::find($id);

        //idにドリルの練習画面に遷移
        return view('drills.lesson', ['drill' => $drill]);
    }
    
    //ドリル編集画面表示
    public function edit($id){
        //Getパラメータをチェック、存在しなければドリル新規登録へ戻る Todo:テスト
        if(!ctype_digit($id)){
            return redirect('/drills')->with('flash_message', __('Invalid operation was performed.'));
        }
        //Getパラメータがあればそれを元に編集するドリルを決定
        $drill = Drill::find($id);

        // 編集画面のviewをドリルの$idと一緒にreturnする
        return view('drills.edit', ['drill' => $drill]);
    }

    //ドリル編集完了
    public function update(Request $request, $id){
        //Getパラメータをチェック、存在しなければドリル新規登録へ戻る Todo:テスト
        if(!ctype_digit($id)){
            return redirect('/drills')->with('flash_message', __('Invalid operation was performed.'));
        }

        //Getパラメータがあればそれを元に編集するドリルを決定
        $drill = Drill::find($id);
        $drill->fill($request->all())->save();

        //編集が完了したら Todo:test =>日本語でフラッシュメッセージが表示されるかどうか
        return redirect('/drills')->with('flash_message',__('Drill is Updated !!'));
    }

    //ドリル削除メソッド
    public function delete($id){
        // GETパラメータが数字かどうかをチェックする
        if(!ctype_digit($id)){
            return redirect('/drills/new')->with('flash_message', __('Invalid operation was performed.'));
        }

        //削除するドリルをidで判別し、$drillの削除メソッドを使用
        Drill::find($id)->delete();
        //二行に分けて書く場合
            //$drill = Drill::find($id)
            //$drill->delete()

        //削除が完了したらドリル一覧画面へ遷移する
        return redirect('/drills')->with('flash_messge', __('Drill is Deleted.'));
    }
}
