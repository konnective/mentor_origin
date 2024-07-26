<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Add Task</h2>
            {{-- <p class="mb-4">Edit:</p> --}}
        </header>

        <form method="POST" action="store" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Task Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="task_name"
                    value="" />
            </div>
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Duration</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="duration"
                    value="" />
            </div>
            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Point</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="points" value="" />
            </div>
            <div class="mb-6">
                <label for="cars">Choose a Project:</label>

                <select class="border border-gray-200 rounded my-2 p-2 w-full" id="cars" name="project_id">
                    @foreach ($projects as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach

                    {{-- <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option> --}}
                </select>
            </div>

            {{-- <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

                <img class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                    alt="" />

                @error('logo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            {{-- <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="Include tasks, requirements, salary, etc">{{ $listing->description }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    ADD
                </button>

                <a href="{{ $path }}" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
