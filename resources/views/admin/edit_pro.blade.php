<x-layout>

    <div class="content-container text-center  px-10  mt-2">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit Product</h2>
            {{-- <p class="mb-4">Edit:</p> --}}
        </header>

        <form method="POST" class="w-4/5 mx-auto" action="{{ route('admin.updatePro') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-6">
                <input type="hidden" class="border border-gray-200 rounded p-2 w-full" name="pro_id"
                    value="{{ $item->id }}" />

            </div>
            <div class="input_container flex space-x-4">
                <div class="flex-1 ">
                    <label for="company" class="block float-left text-lg mb-2">Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        value="{{ $item->title }}" />
                </div>
                <div class="flex-1">
                    <label for="company" class="block float-left text-lg mb-2">Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        value="{{ $item->title }}" />
                </div>

            </div>
            <div class="input_container flex space-x-4">
                <div class="flex-1 ">
                    <label for="company" class="block float-left text-lg mb-2">Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        value="{{ $item->title }}" />
                </div>
                <div class="flex-1">
                    <label for="company" class="block float-left text-lg mb-2">Title</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                        value="{{ $item->title }}" />
                </div>
            </div>

            {{-- <div class="mb-6">
                <div class="rounded-lg bg-gray-200 p-4">
                    <img src="{{ asset('storage/' . $item->img) }}" class="h-40" alt="">
                </div>

                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
            </div> --}}
            <div class="mb-6">
                <label for="subtitle" class="inline-block text-lg mb-2">Description</label>
                <textarea id="description" class="border border-gray-200 rounded p-2 w-full" name="description">{{ $item->description }}</textarea>
            </div>
            <div class="mb-6">

            </div>
            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update
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
