@extends('layouts.app2')
@section('body')
    @if (session('message'))
        <p><b>{{ session('message') }}</b></p>
    @endif
    <div class="space-y-4">
        <span class="block">
            <div class="flex flex-wrap -m-4">
                @foreach ($rooms->sortBy('id') as $room)
                    <div class="p-4 md:w-1/3">
                        <div class=" h-full border-2 border-gray-200 border-opacity-60 rounded-lg
                                                        overflow-hidden">
                            <table class="table-auto border-separate border">
                                <tr>
                                    <th  colspan="2" class="border">Room {{ $room->id }} </th>
                                </tr>
                                @foreach ($beds as $bed)
                                    @if ($bed->room_id == $room->id and $loop->index % 2 == 0)
                                        <tr>
                                            <td class="border">{{ $bed->id }}</td>
                                        @elseif ($bed->room_id == $room->id)
                                            <td class="border">{{ $bed->id }}</td>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </span>
        <div class="block">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-black">Live feed</h1>
            <div id="root">
                <table class="shadow-lg bg-white">
                    <tr>
                        <th class="bg-blue-100 border text-left px-8 py-4">Time</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Bed</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Room</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Risk_level</th>
                        <th class="bg-blue-100 border text-left px-8 py-4">Reason</th>
                    </tr>
                    <tr v-for="value in com">
                        <td class="border px-8 py-4">@{{ time(value . timeOfAlarm) }} </td>
                        <td class="border px-8 py-4">@{{ value . bed_id }}</td>
                        <td class="border px-8 py-4">@{{ value . room_id }}</td>
                        <td class="border px-8 py-4">@{{ value . risk_level }}</td>
                        <td class="border px-8 py-4">@{{ value . reason }}</td>
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
                timez: 'nope',
            },
            methods: {
                time: function(unix_timestamp) {
                    var date = new Date(unix_timestamp * 1000);
                    // Hours part from the timestamp
                    var hours = date.getHours();
                    // Minutes part from the timestamp
                    var minutes = "0" + date.getMinutes();
                    // Seconds part from the timestamp
                    var seconds = "0" + date.getSeconds();

                    // Will display time in 10:30:23 format
                    var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

                    return formattedTime;
                }
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
