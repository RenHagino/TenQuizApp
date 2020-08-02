@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
    <div class="card-header">{{ __('Drill Answers') }}</div>

        <div class="card-body">
            @for($i = 1; $i <= 10; $i++)
                <div class="row col-md-12 my-3 form-group">
                    <span class="h4 px-3 my-0 col-md-3 mx-auto text-center">{{ __('Problem').$i}}の答え</span>
                </div>

                <div class="row col-md-10 form-group mx-auto mt-2">
                    <p class="col-md-1 text-right mx-2 mt-2 h5">問題</p>
                    <input class="col-md-10 form-control" type="text" value="{{ $drill[ 'problem'.($i-1) ] }}" readonly >
                </div>

                    <div class="row col-md-10 form-group mx-auto mt-2">
                        <p class="col-md-1 text-right mx-2 mt-2 h5">答え</p>
                        <input class="col-md-10 form-control" type="text" value="{{ $drill[ 'answer'.($i-1) ] }}"  readonly>
                    </div>
                @endfor
                <div class="row col-md-12 mx-auto py-4 ">
                    <a href="/drills" class="btn btn-primary col-md-3 py-2 mx-auto">{{ __('Back to Drill List')  }}</a>
                </div>
        </div>
@endsection