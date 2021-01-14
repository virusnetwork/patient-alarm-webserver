@extends('layouts.app')
    @section('ward')
        Hospital Ward Name
    @endsection
    
@section('body')
    The current UNIX timestamp is {{ time() }}.

    @foreach ($rooms->sortBy('id') as $room)
        <p>{{$room->id}}</p>
        <p>
        @foreach ($beds as $bed)
            @if ($bed->room_id == $room->id)
                {{$bed->id}}
            @endif
        @endforeach
        </p>
    @endforeach
    
@endsection