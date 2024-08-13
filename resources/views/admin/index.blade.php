    <x-layout>

        <div class="content-container text-center  px-10  mt-2">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">Dashboard</h2>
                {{-- <p class="mb-4">Edit:</p> --}}
            </header>

            <div class="first_section flex space-x-[15px] m-5">
                <div class="left_info    flex-[3]">
                    <div class="pro-table relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Task name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Type
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Points
                                    </th>
                                    <th scope="col" class="py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($tasks) < 1)
                                    <tr>
                                        <td class="px-6 py-4">
                                            No Tasks
                                        </td>
                                    </tr>
                                @endif

                                @foreach ($tasks as $item)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-lg">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->name }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->project }}
                                        </th>

                                        <td class="px-6 py-4">
                                            {{ $item->points }}
                                        </td>
                                        <td class="py-4">
                                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                                id="delPro" type="submit"
                                                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Completed
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="right_info  flex-1 p-15 bg-gray-50 overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="bg-red-50">
                        Profile
                    </div>
                    <div class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        Name
                    </div>
                    <div class="px-6 font-medium text-blue-900 whitespace-nowrap dark:text-white">
                        500
                    </div>
                </div>
            </div>
            {{-- projects table starts from here --}}
            <div class="projects_section items-center justify-center m-5">
                <div class="pro-table relative overflow-x-auto shadow-md sm:rounded-lg w-fulld">

                    {{-- <button class="bg-blue-500 float-right text-white py-2 px-4 rounded-md my-4">
                        <a href="#">
                            Add Product
                        </a>
                    </button> --}}
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Project name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Points
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Last Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Days Left
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($projects) < 1)
                                <tr>
                                    <td class="px-6 py-4">
                                        No Tasks
                                    </td>
                                </tr>
                            @endif
                            @foreach ($projects as $item)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-lg">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->name }}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->cycles }}
                                    </th>

                                    <td class="px-6 py-4">
                                        {{ $item->end_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->days_left }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#"
                                            class="font-medium  text-blue-600 dark:text-blue-500 hover:underline">
                                            <button
                                                class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="button">
                                                Trash
                                            </button></a>

                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                            data-id="1"
                                            class="delBtn inline text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            type="button" onclick="passIdToElement({{ $item->id }})">
                                            Completed
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- section for progress tracker --}}
            <div class="projects_section items-center  m-5">
                <div
                    class="pro-table relative py-10 px-15 flex flex-wrap  bg-gray-50 overflow-x-auto shadow-md sm:rounded-lg w-fulld">
                    @foreach ($recOfMonth as $item)
                        @if ($item->cycles === 1)
                            <div class="sm:rounded-lg h-[30px] mx-5 my-2 w-[30px] bg-lime-400"></div>
                        @else
                            <div class="sm:rounded-lg h-[30px] mx-5 my-2 w-[30px] bg-gray-400"></div>
                        @endif
                    @endforeach
                </div>
            </div>


            {{-- modal popup here --}}
            <div id="popup-modal" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input name="pro_id" id="pro_id" hidden>
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you
                                    want
                                    to
                                    delete this product?</h3>

                                <button data-modal-hide="popup-modal" id="delPro" onclick="makeApiCall()"
                                    type="button"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Yes, I'm sure
                                </button>
                                <button data-modal-hide="popup-modal" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                    cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>



        </div>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            var globalId;

            function passIdToElement(id) {
                document.getElementById('hidee').value = id;
                globalId = id;
            }

            function makeApiCall() {
                const apiUrl = '{{ route('taskDone') }}'
                const data = {
                    id: globalId
                }; // Replace with your actual data

                console.log(globalId)
                return
                fetch(apiUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
                        },
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the API response data
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        </script>
    </x-layout>
