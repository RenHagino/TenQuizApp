@extends('layouts.app')

@section('content')
  <lesson-component 
                      title="{{__('Practice').'「'.$drill->title.'」'}}"
                      :drill="{{$drill}}"
                      category_name="{{$drill->category_name}}"
                      >

  </lesson-component>
@endsection