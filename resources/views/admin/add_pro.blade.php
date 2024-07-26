<x-layout>

    <div class="content-container text-center  px-10  mt-2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Add Product</h2>
            {{-- <p class="mb-4">Edit:</p> --}}
        </header>

        <form method="POST" class="w-4/5 mx-auto" action="{{ route('admin.createPro') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="" />
            </div>
            <div class="mb-6">
                <label for="subtitle" class="inline-block text-lg mb-2">Price</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="price" value="" />
            </div>
            <div class="mb-6">
                <div class="rounded-lg bg-gray-200 p-4">
                    {{-- <img src="{{ env('APP_URL') . '/public/storage/' . $content->img }}" class="h-40" alt=""> --}}
                </div>

                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
            </div>
            <div class="mb-6">
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
