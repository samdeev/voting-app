<x-app-layout>

    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full border-none rounded-xl px-4 py-2">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="other_filters" id="other_filters" class="w-full border-none rounded-xl px-4 py-2">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>

        <div class="w-full md:w-2/3 relative">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                  </svg>
            </div>
            <input type="search" name="" id="" placeholder="Find an idea..." class="w-full border-none rounded-xl bg-white px-4 py-2 pl-8 placeholder:text-gray-900">
        </div>
    </div>
    {{-- end of filters --}}

    {{-- start of ideas container --}}
    <div class="ideas-container space-y-6 my-8">

        @foreach ($ideas as $idea)
            <div class="idea-container bg-white rounded-xl flex hover:shadow-card transition duration-200 ease-in-out cursor-pointer">
                <div class="hidden md:block border-r border-gray-200 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">12</div>
                        <div class="text-gray-500">Votes</div>
                    </div>

                    <div class="mt-8">
                        <button class="w-20 border border-gray-200 hover:border-gray-400 transition duration-200 ease-in-out bg-gray-200 font-bold text-xxs uppercase rounded-xl px-4 py-3">Vote</button>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
                    <div class="flex-none mx-2 md:mx-0">
                        <a href="#">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="h-14 w-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full flex flex-col justify-between mx-2 md:mx-4">
                        <h4 class="text-xl font-semibold mt-2 md:mt-0">
                            <a href="{{ route('ideas.show', $idea->slug) }}" class="hover:underline">{{ $idea->title }}</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                           {{ $idea->description }}
                        </div>

                        <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                            <div class="flex items-center text-xs font-semibold space-x-1.5 md:space-x-2 text-gray-400">
                                <div>{{ $idea->created_at->diffForHumans() }}</div>
                                <div>&bull;</div>
                                <div>Category 1</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">3 Comments</div>
                            </div>

                            <div
                                x-data="{ show: false }"
                                class="flex items-center space-x-2 text-xs mt-4 md:mt-0">
                                <div class="relative bg-gray-200 text-xxs uppercase font-semibold leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                                {{-- Dialog --}}
                                <button @click="show = !show" class="bg-gray-200 border hover:bg-gray-300 rounded-full h-7 transition duration-200 ease-in-out px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>

                                    <ul
                                        x-cloak
                                        x-show="show"
                                        x-transition.duration.400ms
                                        @click.outside="show = false"
                                        @keydown.escape.window="show = false"
                                        class="absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 md:ml-8 mt-2 md:mt-0">
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Mark as spam</a></li>
                                            <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>

                            <div class="flex items-center md:hidden mt-4 md:mt-0">
                                <div class="bg-gray-100 text-center rounded-full h-10 px-4 py-2 pr-8">
                                    <div class="text-sm font-bold leading-none">12</div>
                                    <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                                </div>
                                <button class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-full hover:border-gray-400 transition duration-200 ease-in-out px-4 py-3 -mx-6">
                                    Voted
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- end of idea container --}}
        </div>
        @endforeach
    </div>
    {{-- end of ideas container --}}

    <div class="my-8">
        {{ $ideas->links() }}
    </div>

</x-app-layout>
