<x-layout>
    <div class="p-10 max-w-lg mx-auto mt-24">

        <form method="POST" action="/tasks">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Task Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="" />
            </div>
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label name="price" class="inline-block text-lg mb-2">Task Duration ( in minutes)</label>
                <input type='number' class="border border-gray-200 rounded p-2 w-full" name="duration"
                    placeholder="1 cycle of 25 ,im" value="" />
            </div>
            @error('duration')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="points" class="inline-block text-lg mb-2">Points</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="points" value="" />
            </div>


            {{-- <div class="mb-6">
                <label name="stock" class="inline-block text-lg mb-2"></label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="stock" value="" />
            </div> --}}
            {{-- @error('stock')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror --}}

            {{-- <div class="mb-6">
                <label for="website" name='img' class="inline-block text-lg mb-2">
                    Website/image URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="img" value="" />
            </div> --}}
            {{-- @error('img')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror --}}
            {{-- <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    product Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="this product is for something use " value=""></textarea>
            </div> --}}
            {{-- @error('description')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror --}}

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create task
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>
