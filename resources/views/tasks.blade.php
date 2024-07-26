<x-layout>

    <div>
        {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <div class="container p-8 mx-auto mt-12 bg-white">
            <div class="w-full overflow-x-auto">
                <div class="my-2">
                    <h3 class="text-xl font-bold tracking-wider">number Items are {{ count($items) }}</h3>

                </div>
                <div class="my-2">
                    <a href="{{ $path . '/task/add' }}" class="bg-black text-white my-2 py-2 px-5">Add Task</a>
                </div>

                <table class="w-full shadow-inner">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Task Name</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Cycles</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Input</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($items) == 0)
                            <tr>
                                <td class="p-4 px-6 text-center whitespace-nowrap">No Items Found!</td>
                            </tr>
                        @endif
                        @foreach ($items as $task)
                            <tr>
                                <td class="p-4 px-6 text-center whitespace-nowrap">{{ $task->name }}</td>

                                <td class="p-4 px-6 text-center whitespace-nowrap">
                                    <button class="px-2 py-0 text-red-100 bg-blue-600 rounded">
                                        {{ $task->cycles }}
                                    </button>
                                </td>
                                <td class="p-4 px-4 text-center whitespace-nowrap">
                                    <input type="number" name="cycles" value=""
                                        class="inputData px-2 py-0 border-2 border-gray-300  rounded">
                                    <input type="hidden" name="project_id" value="{{ $task->project_id }}"
                                        class="project">
                                    <button class="postData px-2 py-1 bg-green-600 " data-id="{{ $task->id }}"><i
                                            class="fa-solid fa-check"></i></button>
                                </td>
                                <td class="p-4 px-6 text-center whitespace-nowrap">
                                    <button id="complete" class="px-2 py-1 text-red-100 bg-green-600 rounded">
                                        {{ $task->status == 1 ? 'Completed' : 'In-progress' }}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


        {{-- charts --}}
        <div class="mx-auto w-3/5 overflow-hidden">
            <canvas data-te-chart="line" data-te-dataset-label="Traffic"
                data-te-labels="['Monday', 'Tuesday' , 'Wednesday' , 'Thursday' , 'Friday' , 'Saturday' , 'Sunday ']"
                data-te-dataset-data="[2112, 2343, 2545, 3423, 2365, 1985, 987]">
            </canvas>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            // Attach click event handler to the button

            $(".postData").click(function() {
                // Make an AJAX POST request
                var id = $(this).data("id");
                // Find the corresponding input field
                var index = $(".postData").index(this);
                var inputData = $(".inputData").eq(index).val();
                var pro_id = $(".project").eq(index).val();
                console.log(pro_id)
                $.ajax({
                    url: "update/" + id,
                    type: "POST",
                    dataType: 'json',
                    encode: true,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        cycles: inputData,
                        project_id: pro_id
                    },
                    success: function(response) {
                        // Handle the successful response from the API
                        // alert("API call successful!");
                        console.log(response); // Log the response to the console
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        // alert("Error occurred while calling API: " + error);
                        console.log(error);
                    }
                });
            });
        });
    </script>

</x-layout>
