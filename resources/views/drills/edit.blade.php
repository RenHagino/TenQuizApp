@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Drill Updater') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('drills.update', $drill->id ) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $drill->title }}" autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_name" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                <div class="col-md-6">
                                    <input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" value="{{ $drill->category_name }}" autocomplete="category_name" autofocus>

                                    @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @for ($i = 1; $i <= 10; $i++)
                                <!--解答方法コンポーネント-->
                                <div class="form-group row mt-4">
                                    
                                    <!--問題Noラベル-->
                                    <label for="problem{{$i-1}}" class="col-md-12 col-form-label text-md-center">{{ __('Problem').$i }}</label><br>

                                    <!--解答方法コンポーネント-->
                                    <div class="col-md-12">
                                        <div class="col-md-3 mx-auto mb-2">
                                            <select name="a_method{{$i-1}}" id="" class="form-control">
                                            <option class="placeholder" value="" selected>解答方法を選択</OPTION>
                                            <option class="" value="ひらがな" @if($drill[ 'a_method'.($i-1)]=='ひらがな') selected @endif>ひらがな</option>
                                            <option class="" value="漢字" @if($drill[ 'a_method'.($i-1)]=='漢字') selected @endif>漢字</option>
                                            <option class="" value="英数字" @if($drill['a_method'.($i-1)]=='英数字') selected @endif>英数字</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!--問題コンポーネント-->
                                <div class="form-group row">
                                <div class="col-md-6 mx-auto">
                                <!--valueに problem + 問題番号 0~9 を指定してDBの値が元から入力された状態にする-->
                                <input id="problem{{$i - 1}}" type="text" class="form-control @error('problem'.($i - 1)) is-invalid @enderror" name="problem{{$i - 1}}" value="{{$drill[ 'problem'.($i-1) ]}}" placeholder="内容を入力" autocomplete="problem{{$i - 1}}" autofocus>
                                @error('problem'.($i - 1))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                                </div>

                                <!--答えコンポーネント-->
                                <div class="form-group row">
                                    <div class="col-md-5 mx-auto">
                                    <!--valueに answer + 問題番号0~9 を指定してDBの値が元から入力された状態にする-->
                                    <input id="answer{{$i-1}}" type="text" class="form-control @error('answer'.($i - 1)) is-invalid @enderror" name="answer{{$i - 1}}" value="{{$drill[ 'answer'.($i-1) ]}}" placeholder="答えを入力" autocomplete="answer{{$i - 1}}" autofocus>
                                    @error('answer'.($i - 1))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                
                            @endfor

                            <!--更新ボタン-->
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-primary mx-auto">
                                    {{ __('Update Drill') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection