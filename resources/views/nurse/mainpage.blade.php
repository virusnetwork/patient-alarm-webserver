@extends('layouts.app2')
@section('ward')
    Hospital Ward Name
@endsection
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
