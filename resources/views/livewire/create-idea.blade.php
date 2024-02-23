<form wire:submit="createIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
    <div>
        <input type="text" wire:model="title" placeholder="You idea..." class="w-full text-sm border-none bg-gray-100 rounded-xl placeholder:text-gray-900 px-4 py-2">
        @error('title')
            <p class="text-red text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <select wire:model="category_id" name="category_add" id="category_add" class="w-full bg-gray-100 text-sm border-none rounded-xl px-4 py-2">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="text-red text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <textarea wire:model="description" name="idea" id="idea" cols="30" rows="4" class="w-full border-none bg-gray-100 resize-none rounded-xl placeholder:text-gray-900 text-sm px-4 py-2" placeholder="Describe your idea..."></textarea>
        @error('description')
            <p class="text-red text-xs mt-2">{{ $message }}</p>
        @enderror
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
            <span class="uppercase">Submit</span>
        </button>
    </div>

    <div>
        @if (session('success'))
            <div
                x-data="{ visible: true }"
                x-init="
                    setTimeout(() => {
                        visible = false
                    }, 5000)
                "
                x-show.transition.duration.1000ms
                class="text-green mt-4">
                <span x-show="visible">{{ session('success') }}</span>
            </div>
        @endif
    </div>
</form>
