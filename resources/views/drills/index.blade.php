@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-md-12 my-4">
            <h2 class="col-md-4 text-center mx-auto">{{ __('Drill List') }}</h2>
        </div>

        <div class="row col-md-12">
            @foreach ($drills as $drill)
            <div class="col-md-6 mx-auto mt-4">
                <div class="card col-md-12">
                    <div class="card-body">
                        <h3 class="card-title">{{ $drill->title }}</h3>
                        <div class="row col-md-12">
                            <a href="{{ route('drills.lesson', $drill->id) }}" class="btn btn-primary col-md-5 py-2 mx-1">{{ __('Go Practice')  }}</a>
                            <a href="{{route('drills.answer', $drill->id) }}" class="btn btn-warning col-md-5 py-2 mx-1">{{ __('See Answer')  }}</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection