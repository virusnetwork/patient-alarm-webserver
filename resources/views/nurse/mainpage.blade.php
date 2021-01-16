@extends('layouts.app2')

@section('body')

    @if (session('message'))
        <p><b>{{ session('message') }}</b></p>
    @endif
    <div class="flex flex-wrap -m-4">
        @foreach ($rooms->sortBy('id') as $room)
            <div class="p-4 md:w-1/3"">
                        <div class=" h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <table class="table-auto border-separate border">
                    <tr>
                        <th class="border">Room {{ $room->id }} </th>
                    </tr>
                    @foreach ($beds as $bed)
                        @if ($bed->room_id == $room->id)
                            <tr>
                                <td class="border">{{ $bed->id }}</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
    </div>

    <script>
        var App = new Vue({
            el: '#root',
            data: {
                com: [],
                username: '',
                error: false,
                message: '',
            },
            methods: {
                
            },
            mounted() {
            }
        });

    </script>
    @endforeach
@endsection
