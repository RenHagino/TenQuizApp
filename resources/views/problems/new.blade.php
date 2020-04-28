@extends('layouts.app')

@section('content')
  <div class="container">
    <p>ここはdrills.newページです</p>
    <div class="main">
      <!--フォーム-->
      <form action="post" action="">
        <!--問題1~10-->
        @for($i = 0; $i < 10; $i++)
          <div class="form_content">
            <span class="problem_title">{{__('問題').($i + 1)}}</span><br>
            <input id="problem{{$i -1}}" type="text" class="form_content_input" autofocus>
            @error('problem'.($i - 1))
              <span class="err" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        @endfor
        <!--登録ボタン-->
        <button type="submit" class="btn btn-primary">
            {{__('登録する')}}
        </button>
      </form>
    </div>
  </div>

@endsection

