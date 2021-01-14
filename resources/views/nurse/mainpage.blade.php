@extends('layouts.app')
    @section('ward')
        Hospital Ward Name
    @endsection
    
@section('body')
    The current UNIX timestamp is {{ time() }}.

    @foreach ($rooms->sortBy('id') as $room)
        <p>{{$room->id}}</p>
    @endforeach
@endsection