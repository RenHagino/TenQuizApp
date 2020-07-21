@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Drill List') }}</h2>
        <div class="row">

            @foreach ($drills as $drill)

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $drill->title }}</h3>
                        <div class="row">
                          <a href="{{ route('drills.lesson', $drill->id) }}" class="btn btn-primary col-md-4 py-2 mx-2">{{ __('Go Practice')  }}</a>
                          <a href="{{ route('drills.edit', $drill->id) }}" dclass="btn btn-success col-md-3 py-2 mx-2">{{ __('Edit')  }}</a>
                          <form action="{{ route('drills.delete', $drill->id) }}" method="post" class="col-md-4">
                            @csrf
                            <button class="btn btn-danger py-2" onclick='return confirm("削除しますか？");'>{{ __('Delete')  }}</button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
@endsection