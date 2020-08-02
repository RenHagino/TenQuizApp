@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row col-md-12 my-4">
            <h2 class="col-md-4 text-center mx-auto">{{ __('Registered Drills') }}</h2>
        </div>
        <div class="row">

            @foreach ($drills as $drill)

            <div class="col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $drill->title }}</h3>
                        <div class="row col-md-12">
                            <a href="{{ route('drills.lesson', $drill->id) }}" class="btn btn-primary col-md-5 py-2 mx-1">{{ __('Go Practice')  }}</a>
                            <a href="{{ route('drills.edit', $drill->id) }}" class="btn btn-success col-md-5 py-2 mx-1">{{ __('Edit')  }}</a>
                        </div>
                        <div class="row col-md-12">
                        <a href="{{route('drills.answer', $drill->id) }}" class="btn btn-warning col-md-5 mt-2 py-2 mx-1">{{ __('See Answer')  }}</a>
                            <form action="{{ route('drills.delete', $drill->id) }}" method="post" class="col-md-5 px-0 mt-2 mx-1 ">
                                @csrf
                                <button class="btn btn-danger col-md-12 py-2 col-md-5" onclick='return confirm("削除しますか？");'>{{ __('Delete')  }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection