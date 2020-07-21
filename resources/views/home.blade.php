@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    メインメニュー
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!--ボタン行１-->
                    <div class="row bg-secondary">
                        <!--問題集を探す-->
                        <button class="col-md-12 col-md-offset-3 btn btn-primary my-2 mx-2">
                            <h6 class="text-md-center ">問題集を検索</h6>
                        </button>
                        <!--登録した問題集を見る-->
                        <button class="col-md-12 col-md-offset-3 btn btn-primary my-2 mx-2">
                            <h6 class="text-md-center">登録済みの問題集</h6>
                        </button>
                    </div>
                    <!--ボタン行2-->
                    <div class="row bg-secondary">
                        <!--記録-->
                        <button class="col-md-12 col-md-offset-3 btn btn-primary mx-2 my-2">
                            <h6 class="text-md-center">お気に入り</h6>
                        </button>
                        <!---->
                        <button class="col-md-12 col-md-offset-3 btn btn-primary my-2 mx-2">
                            <h6 class="text-md-center">
                                Menu_4
                            </h6>
                        </button>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
