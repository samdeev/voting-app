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
                                <span class="ml-1">Notifiy all voters</span>
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
            <div @class(['text-xl leading-snug', 'text-blue' => $hasVoted])>{{ $votesCount }}</div>
            <div class="text-gray-400 text-xs leading-none">Votes</div>
        </div>

        <button
            type="button"
            @class([
                'h-11 text-xs font-semibold rounded-xl border transition duration-200 ease-in-out px-6 py-3',
                'bg-blue border-blue hover:border-blue text-white' => $hasVoted,
                'bg-gray-200 border-gray-200 hover:border-gray-200' => !$hasVoted,
            ])
        >
            <span class="mr-2 uppercase">Vote</span>
        </button>
    </div>
</div>
