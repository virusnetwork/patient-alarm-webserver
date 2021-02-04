<!--TailwindCSS template taken from https://mertjf.github.io/tailblocks/ -->
<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-pink-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        @if (isset($room))
        <span class="ml-3 text-xl">{{App\Models\Ward::find($room->ward_id)->name}}</span>
        @else
        <span class="ml-3 text-xl">Index</span>
        @endif
        
      </a>
        <nav
            class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-700	flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-white" href='/posts/'>Posts</a>
            @auth
                <a class="mr-5 hover:text-white" href='/dashboard/'>Account</a>
            @endauth
            @guest
                <a class="mr-5 hover:text-white" href='/register'>Register</a>
            @endguest

            @auth
                <a class="inline-flex items-center bg-gray-800 border-0 py-1 px-3 focus:outline-none hover:bg-gray-700 rounded text-base mt-4 md:mt-0"
                    href='/posts/create'>New
                    Post
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            @endauth

        </nav>
    </div>
</header>
