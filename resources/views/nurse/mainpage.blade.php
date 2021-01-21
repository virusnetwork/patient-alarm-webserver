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
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-black">Live feed</h1>
        <div>
            <ol>
                <li v-for="value in com">
                    <div class="border border-gray-800 p-6 rounded-lg">
                        <h2 class="text-lg text-white font-medium title-font mb-2"> @{{ value . comment_content }}</h2>
                        <p class="leading-relaxed text-base">by @{{ value . author_username }}</p>
                    </div>
        </div>
        </li>
        </ol>
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
                //axios.get("{{route('api.alarms.index',$rooms->first()->id)}}")
                //.then(response =>{console.log(response)})
            }
        });

    </script>
@endsection
