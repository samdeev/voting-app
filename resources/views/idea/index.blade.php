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
        <livewire:idea-index :idea="$idea" :votesCount="$idea->votes_count" />
        @endforeach
    </div>
    {{-- end of ideas container --}}

    <div class="my-8">
        {{ $ideas->links() }}
    </div>

</x-app-layout>
