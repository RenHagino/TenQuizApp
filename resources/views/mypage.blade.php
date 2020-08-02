@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center mt-2">メインメニュー</h4>
                </div>

                <div class="card-body bg-light">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!--ボタン行１-->
                    <div class="row mt-3">
                        <!--問題集を探す-->
                        <a href="/drills" class="col-md-5 btn btn-success mx-auto text-md-center text-dark mt-2  mx-1 py-3 h6">問題集を探す</a>
                        <!--問題集を投稿-->
                        <a href="{{ route('drills.new') }}" class="col-md-5 btn btn-success mx-auto text-dark text-md-center mt-2  mx-1 py-3 h6">問題集を投稿</a>
                    </div>
                    <div class="row mt-3">
                        <!--登録した問題集を見る-->
                        <a href="{{ route('mypage.mydrill') }}" class="col-md-5 btn btn-success mx-auto text-md-center text-dark mt-2  mx-1 py-3 h6">投稿した問題集一覧</a>
                        <!--お気に入り登録したドリル $user->id or $user_idどちらを渡す？ -->
                        <a href="{{ route('mypage.myfav') }}" class="col-md-5 btn btn-success mx-auto text-md-center text-dark mt-2  mx-1 py-3 h6">お気に入りドリル</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection

