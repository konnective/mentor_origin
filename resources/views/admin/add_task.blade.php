<x-layout>

    <div class="content-container text-center  px-10  mt-2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Add Task</h2>
            {{-- <p class="mb-4">Edit:</p> --}}
        </header>

        <form method="POST" class="w-4/5 mx-auto" action="{{ route('task.create') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')



            <div class="input_container flex space-x-4">
                <div class="flex-1 ">
                    <label for="company" class="block float-left text-lg mb-2">Task Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                        value="" />
                </div>
                <div class="flex-1 ">
                    <label for="project" class="block float-left text-lg">Task Type</label>

                    <select class="border border-gray-200 rounded my-2 p-2 w-full" id="cars" name="type">
                        <option value="0">
                            Single
                        </option>
                        <option value="1">
                            Multi
                        </option>
                    </select>
                </div>
            </div>
            <div class="input_container mt-4 flex space-x-4">
                <div class="flex-1 ">
                    <label for="project" class="block float-left text-lg">Project</label>

                    <select class="border border-gray-200 rounded my-2 p-2 w-full" id="cars" name="project_id">
                        @foreach ($projects as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="company" class="block float-left text-lg mb-2">Points</label>
                    <input type="number" class="border border-gray-200 rounded p-2 w-full" name="points"
                        value="" />
                </div>

            </div>
            <div class="mb-6 mt-4">
                <label for="subtitle" class="inline-block text-lg mb-2">Description</label>
                <textarea id="description" class="border border-gray-200 rounded p-2 w-full" name="description"></textarea>
            </div>
            <div class="mb-6">
                {{-- <label for="cars">Choose a Project:</label> --}}

                {{-- <select class="border border-gray-200 rounded my-2 p-2 w-full" id="cars" name="project_id">
                    @foreach ($projects as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select> --}}
            </div>
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Submit
                </button>

                <a href="" class="text-black ml-4"> Back </a>
            </div>
        </form>

    </div>




    {{-- cke editor snipppet --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor.create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
</x-layout>
