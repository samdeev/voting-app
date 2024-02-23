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
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2 md:mx-0">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="h-14 w-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-2 md:mx-4">
                <h4 class="text-xl font-semibold mt-2 md:mt-0">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3 line-clamp-3">
                   {{ $idea->description }}
                </div>

                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                        <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>

                    <div
                        x-data="{ show: false }"
                        class="flex items-center space-x-2 text-xs mt-4 md:mt-0"
                    >
                    <div @class([
                        'text-xxs uppercase font-bold leading-none rounded-full text-center w-28 h-7 py-2 px-4',
                        'bg-blue text-white' => $idea->status->name === 'Open',
                        'bg-purple text-white' => $idea->status->name === 'Considering',
                        'bg-yellow text-white' => $idea->status->name === 'In Progress',
                        'bg-green text-white' => $idea->status->name === 'Implemented',
                        'bg-red text-white' => $idea->status->name === 'Closed',
                        ])>
                            {{ $idea->status->name }}
                    </div>

                        {{-- Dialog --}}
                        <button
                            @click="show = !show"
                            type="button" class="bg-gray-200 border hover:bg-gray-300 rounded-full h-7 transition duration-200 ease-in-out px-4"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                              </svg>

                              <ul
                                x-cloak
                                x-show="show"
                                x-transition.duration.400ms
                                @click.outside="show = false"
                                @keydown.escape.window="show = false"
                                class="absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 md:ml-8 mt-2 md:mt-0 z-40"
                            >
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
    </div>
    {{-- end of idea container --}}

    {{-- start of buttons container --}}
    <div class="buttons-container flex items-center justify-between mt-6">
        <div
            x-data="{ show: false }"
            class="flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-4 md:ml-6">
            <div class="relative">
                <button
                    @click="show = !show"
                    type="button"
                    class="flex items-center justify-between h-11 w-full text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in-out px-6 py-3 uppercase"
                >
                    Reply
                </button>

                {{-- reply dialog --}}
                <div
                    x-cloak
                    x-show="show"
                    x-transition.duration.400ms
                    @click.outside="show = false"
                    @keydown.escape.window="show=false"
                    class="absolute z-10 w-80 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                    <form action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea
                                name="post_comment"
                                id="post_comment"
                                cols="30"
                                rows="4"
                                class="w-full text-sm bg-gray-100 rounded-xl  placeholder:text-gray-900 border-none px-4 py-2 resize-none" placeholder="Go ahead, don't be shy. Share your thoughts..."></textarea>
                        </div>
                        <div class="flex flex-col md:flex-row items-center md:space-x-3 space-y-3 md:space-y-0">
                            <button
                            type="button"
                            class="flex items-center justify-center h-11 w-full md:w-1/2 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in-out px-6 py-3 uppercase"
                        >
                            Post Comment
                        </button>
                        <button
                                type="button"
                                class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in-out"
                            >
                                <svg class="-rotate-45 text-gray-600 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                  </svg>
                                <span class="ml-1 uppercase">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
                {{-- end of reply dialog --}}
            </div>

            {{-- start of status --}}
            <div
                x-data="{ show: false }"
                class="relative">
                <button
                    @click="show = !show"
                    type="button"
                    class="flex items-center justify-center h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in-out px-6 py-3"
                >
                    <span class="mr-2 uppercase">Set Status</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                      </svg>
                </button>

                {{-- start of set status dialog --}}
                <div
                    x-cloak
                    x-show="show"
                    x-transition.duration.400ms
                    @click.outside="show =  false"
                    @keydown.escape.window="show = false"
                    class="absolute z-20 w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2">
                    <form action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked name="radio-direct" value="1" class="bg-gray-200 text-green border-none">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" value="2" class="bg-gray-200 text-purple border-none">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" value="3" class="bg-gray-200 text-yellow border-none">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" value="4" class="bg-gray-200 text-blue border-none">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="radio-direct" value="5" class="bg-gray-200 text-red border-none">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>

                            <div>
                                <textarea
                                    name="update_comment"
                                    id="update_comment"
                                    ols="30"
                                    rows="3"
                                    placeholder="Add an update comment (optional)"
                                    class="w-full text-sm bg-gray-100 rounded-xl placeholder:text-gray-900 border-none px-4 py-2 resize-none"
                                ></textarea>
                            </div>

                            <div class="flex items-center justify-between space-x-3">
                                <button
                                    type="button"
                                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-200 ease-in-out"
                                >
                                    <svg class="-rotate-45 text-gray-600 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                      </svg>
                                    <span class="ml-1 uppercase">Attach</span>
                                </button>

                                <button
                                    type="submit"
                                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-200 ease-in-out"
                                >
                                    <span class="uppercase">Update</span>
                                </button>
                            </div>

                            <div>
                                <label for="notify_voters" class="font-normal inline-flex items-center">
                                    <input type="checkbox" name="notify_voters" id="notify_voters" checked class="bg-gray-200 border-none rounded">
                                    <span class="ml-1">Notfiy all voters</span>
                                </label>
                            </div>

                        </div>
                    </form>
                </div>
                {{-- end of set status dialog --}}
            </div>
            {{-- end of set status --}}
        </div>

        <div class="hidden md:flex items-center justify-between space-x-4">
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
    <div class="comments-container relative space-y-6 md:ml-22 my-8 mt-1 pt-4">
        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="h-14 w-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full md:mx-4">
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident et obcaecati delectus libero, sit dolor sunt voluptatem iste similique corrupti quae, nam minima corporis saepe quos deserunt error sequi rerum?
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div class="font-bold text-gray-900">John Doe</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div
                            x-data="{ show: false }"
                            class="flex items-center space-x-2 text-xs">
                            {{-- Dialog --}}
                            <button
                                @click="show = !show"
                                class="bg-gray-200 border hover:bg-gray-300 rounded-full h-7 transition duration-200 ease-in-out px-4"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                  </svg>

                                  <ul
                                    x-cloak
                                    x-show="show"
                                    x-transition.duration.400ms
                                    @click.outside="show = false"
                                    @keydown.escape.window="show = false"
                                    class="absolute w-44 font-semibold text-left bg-white shadow-dialog rounded-xl py-3 z-30 mt-2 -ml-34 md:ml-8">
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
