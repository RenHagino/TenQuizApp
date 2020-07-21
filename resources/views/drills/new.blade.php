@extends('layouts.app')

@section('content')
  <form method="POST" action="{{ route('drills.create') }}" class="form form-problem">
  @csrf
    <div class="card-body">

      <!--タイトルとジャンルー-->
      <div class="form-group row">
          <div class="col-md-12">
            <label for="" class="col-md-12 text-md-center">{{__('DrillTitle')}}</label>
            <div class="col-md-6 mx-auto">
              <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="" autocomplete="title" autofocus>
            </div>
          </div>
      </div>

      <!--カテゴリー-->
      <div class="form-group row">
        <div class="col-md-12">
          <label for="" class="col-md-12 text-md-center">{{__('DrillCategory')}}</label>
          <div class="col-md-6 mx-auto">
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="category_name" placeholder="" autocomplete="category_name" autofocus>
          </div>
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
                  <option class="" value="ひらがな" @if(old('a_method'.($i-1))=='ひらがな') selected @endif>ひらがな</option>
                  <option class="" value="漢字" @if(old('a_method'.($i-1))=='漢字') selected @endif>漢字</option>
                  <option class="" value="英数字" @if(old('a_method'.($i-1))=='英数字') selected @endif>英数字</option>
                </select>
              </div>
            </div>
        </div>

        <!--問題コンポーネント-->
        <div class="form-group row">
          <div class="col-md-6 mx-auto">
              <input id="problem{{$i - 1}}" type="text" class="form-control @error('problem'.($i - 1)) is-invalid @enderror" name="problem{{$i - 1}}" value="{{ old('problem'.($i-1)) }}" placeholder="問題内容を入力" autocomplete="problem{{$i - 1}}" autofocus>
              @error('problem'.($i - 1))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
        </div>

        <!--答えコンポーネント-->
        <div class="form-group row">
          <div class="col-md-6 mx-auto">
          <input id="answer{{$i-1}}" type="text" class="form-control @error('answer'.($i - 1)) is-invalid @enderror" name="answer{{$i - 1}}" value="{{ old('answer'.($i-1)) }}" placeholder="答えを入力" autocomplete="answer{{$i - 1}}" autofocus>
          @error('answer'.($i - 1))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
          @enderror
          </div>
        </div>
      @endfor

      <!--登録ボタン-->
      <div class="form-group row">
        <button type="submit" class="col-md-2 mx-auto mt-4 btn btn-primary">
          {{ __('RegisterProblem') }}
        </button>
      </div>

    </div>
    
  </form>
  @endsection