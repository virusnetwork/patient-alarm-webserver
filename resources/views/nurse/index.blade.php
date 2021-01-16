@extends('layouts.app2')

@section('body')
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100">
            <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                </div>

                </a>
            </div>
        </div>
    </div>

    @foreach ($wards as $ward)
        <div class="md:flex-grow">
            <h2  onclick="location.href='/ward/{{ $ward->name }}';" class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $ward->name }}</h2>
        </div>
    @endforeach
</section>
@endsection
