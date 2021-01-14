@extends('layouts.app')
    @section('ward')
        Hospital Ward Name
    @endsection
    
    <style>
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        th, td {
          padding: 5px;
          text-align: left;    
        }
        </style>
@section('body')
    The current UNIX timestamp is {{ time() }}.

    @foreach ($rooms->sortBy('id') as $room)
    <table style="width:100%">
        <tr>
            <th>Room {{$room->id}} </th>
        </tr>
            @foreach ($beds as $bed)
            @if ($bed->room_id == $room->id)
                <tr><td>{{$bed->id}}</td></tr>
            @endif
        @endforeach
    </table>
    @endforeach
    
@endsection