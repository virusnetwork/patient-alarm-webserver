@extends('layouts.app2')

@section('page_name')
@endsection


@section('body')

    @if (session('message'))
        <p><b>{{ session('message') }}</b></p>
    @endif
    <div class="flex flex-wrap -m-4">
        @foreach ($rooms->sortBy('id') as $room)
            <div class="p-4 md:w-1/3"">
                <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                    <table style="width:10%">
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
            </div>
        @endforeach

    </div>
@endsection
