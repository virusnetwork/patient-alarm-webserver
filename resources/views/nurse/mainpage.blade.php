@extends('layouts.app')
@section('ward')
    Hospital Ward Name
@endsection
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    table ,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }
    #main {
        display:inline-block;
        flex-flow: row-reverse wrap;
}

#main div {
  width: 50px;
  height: 50px;
}

</style>
@section('body')
    @foreach ($rooms->sortBy('id') as $room)
    <div id='main'>
            <table style="width:10%" >
                <tr>
                    <th>Room {{ $room->id }} </th>
                </tr>
                @foreach ($beds as $bed)
                    @if ($bed->room_id == $room->id)
                        <tr>
                            <td>{{ $bed->id }}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    @endforeach

@endsection
