<x-layout>
    <div class="p-10 max-w-lg mx-auto mt-24">

        <form method="POST" action="/save_payment">
            @csrf

            <div class="mb-6">
                <label for="points" class="inline-block text-lg mb-2">amount</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="amount" value="" />
            </div>
                       
            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    payment Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="this product is for something use " value=""></textarea>
            </div> 
            @error('description')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    save payment
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>
</x-layout>
