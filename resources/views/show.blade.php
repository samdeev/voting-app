<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
              </svg>
            <span class="ml-2">All Ideas</span>
        </a>
    </div>

    {{-- start of idea container --}}
    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="h-14 w-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">A random text</a>
                </h4>
                <div class="text-gray-600 mt-3 line-clamp-3">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, veritatis.
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="font-bold text-gray-900">John Doe</div>
                        <div>&bull;</div>
                        <div>10 hours ago</div>
                        <div>&bull;</div>
                        <div>Category 1</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>
                    <div class="flex items-center space-x-2 text-xs">
                        <div class="relative bg-gray-200 text-xxs uppercase font-semibold leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                        {{-- Dialog --}}
                        <button class="bg-gray-200 border hover:bg-gray-300 rounded-full h-7 transition duration-200 ease-in-out px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                              </svg>

                              <ul class="hidden absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8">
                                <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Mark as spam</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Delete Post</a></li>
                              </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of idea container --}}

    {{-- start of buttons container --}}
    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex items-center space-x-4 ml-6">
            <button
                type="button"
                class="flex items-center justify-between h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in-out px-6 py-3"
            >
                <span class="uppercase">Reply</span>
            </button>

            <button
                type="button"
                class="flex items-center justify-center h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in-out px-6 py-3"
            >
                <span class="mr-2 uppercase">Set Status</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                  </svg>
            </button>
        </div>

        <div class="flex items-center justify-between space-x-4">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>

            <button
                type="button"
                class="h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in-out px-6 py-3"
            >
                <span class="mr-2 uppercase">Vote</span>
            </button>
        </div>
    </div>
    {{-- end of buttons container --}}

    {{-- start of comments container --}}
    <div class="comments-container relative space-y-6 ml-22 my-8 mt-1 pt-4">
        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random text</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident et obcaecati delectus libero, sit dolor sunt voluptatem iste similique corrupti quae, nam minima corporis saepe quos deserunt error sequi rerum?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center space-x-2 text-xs">
                            {{-- Dialog --}}
                            <button class="bg-gray-200 border hover:bg-gray-300 rounded-full h-7 transition duration-200 ease-in-out px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                  </svg>

                                  <ul class="hidden absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8">
                                    <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Delete Post</a></li>
                                  </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="is-admin comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                    <div class="text-center uppercase text-blue text-xxs font-bold mt-1">Admin</div>
                </div>
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status changed to "Under Consideration"</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident et obcaecati delectus libero, sit dolor sunt voluptatem iste similique corrupti quae, nam minima corporis saepe quos deserunt error sequi rerum?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-blue">Andrea</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center space-x-2 text-xs">
                            {{-- Dialog --}}
                            <button class="bg-gray-200 border hover:bg-gray-300 rounded-full h-7 transition duration-200 ease-in-out px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                  </svg>

                                  <ul class="hidden absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8">
                                    <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Delete Post</a></li>
                                  </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    {{-- <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random text</a>
                    </h4> --}}
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident et obcaecati delectus libero, sit dolor sunt voluptatem iste similique corrupti quae, nam minima corporis saepe quos deserunt error sequi rerum?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">Mark Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center space-x-2 text-xs">
                            {{-- Dialog --}}
                            <button class="bg-gray-200 border hover:bg-gray-300 rounded-full h-7 transition duration-200 ease-in-out px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                  </svg>

                                  <ul class="hidden absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 ml-8">
                                    <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 block px-5 py-3 transition duration-200 ease-in-out">Delete Post</a></li>
                                  </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of comment container --}}
    </div>
    {{-- end of comments container --}}

</x-app-layout>
