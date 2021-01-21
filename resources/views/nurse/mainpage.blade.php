@extends('layouts.app2')

@section('body')

    @if (session('message'))
        <p><b>{{ session('message') }}</b></p>
    @endif
    <div class="flex flex-wrap -m-4">
        @foreach ($rooms->sortBy('id') as $room)
            <div class="p-4 md:w-1/3">
                <div class=" h-full border-2 border-gray-200 border-opacity-60 rounded-lg
                                overflow-hidden">
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
        @endforeach
        <div class="block">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-black">Live feed</h1>
            <div id="root">
                <table>
                    <tr>
                        <th class="border">Time</th>
                        <th class="border">Bed</th>
                        <th class="border">Room</th>
                        <th class="border">Risk_level</th>
                        <th class="border">Reason</th>
                    </tr>
                    <tr v-for="value in com">
                        <td>@{{ value . timeOfAlarm }}</td>
                        <td>@{{ value . bed_id }}</td>
                        <td>@{{ value . room_id }}</td>
                        <td>@{{ value . risk_level }}</td>
                        <td>@{{ value . reason }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        var App = new Vue({
            el: '#root',
            data: {
                com: [],
                error: false,
                message: '',
            },
            mounted() {
                axios.get("{{ route('api.alarms.index', $rooms->first()->ward_id) }}")
                    .then(response => {
                        this.com = response.data.data;
                    })
                    .catch(response => {
                        console.log(response);
                    })
            }
        });

    </script>
@endsection
