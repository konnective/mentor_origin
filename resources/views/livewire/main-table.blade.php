<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container p-8 mx-auto mt-12 bg-white">
        <div class="w-full overflow-x-auto">
            <div class="my-2">
                <h3 class="text-xl font-bold tracking-wider">number Items are 3</h3>
            </div>
            <table class="w-full shadow-inner">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 font-bold whitespace-nowrap">Task Name</th>
                        <th class="px-6 py-3 font-bold whitespace-nowrap">Duration</th>
                        <th class="px-6 py-3 font-bold whitespace-nowrap">Points</th>
                        <th class="px-6 py-3 font-bold whitespace-nowrap">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="p-4 px-6 text-center whitespace-nowrap">{{ $task->name }}</td>
                            <td class="p-4 px-6 text-center whitespace-nowrap">
                                <div>
                                    {{-- <button class="px-2 py-0 shadow" wire:click="">-</button> --}}
                                    <input type="text" name="qty" value="{{ $task->duration }}"
                                        class="w-12 text-center bg-gray-100 outline-none" />
                                    {{-- <button class="px-2 py-0 shadow" wire:click="">+</button> --}}
                                </div>
                            </td>
                            <td class="p-4 px-6 text-center whitespace-nowrap">
                                <button class="px-2 py-0 text-red-100 bg-blue-600 rounded">
                                    {{ $task->points }}
                                </button>
                            </td>
                            <td class="p-4 px-6 text-center whitespace-nowrap">
                                <button id="complete" class="px-2 py-0 text-red-100 bg-green-600 rounded"
                                    wire:click="removeTask({{ $task->id}},{{$task->points }})">
                                    completed
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="p-4 px-6 text-center whitespace-nowrap"></td>
                        <td class="p-4 px-6 text-center whitespace-nowrap">
                            <div class="font-bold">Total Qty - </div>
                        </td>
                        <td class="p-4 px-6 font-extrabold text-center whitespace-nowrap">
                            Total -
                        </td>
                        <td class="p-4 px-6 text-center whitespace-nowrap">
                            {{-- <button class="px-4 py-1 text-red-600 bg-red-100">
                                Clear All
                            </button> --}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-end mt-4 space-x-2">
                <a href="/create">

                    <button
                        class="
                    px-6
                    py-3
                    text-sm text-gray-800
                    bg-indigo-200
                    hover:bg-gray-400
                    ">
                        Create Task
                    </button>
                </a>

               
                   
                    
                    <button
                        class="
                    px-6
                    py-3
                    text-sm text-gray-800
                    bg-green-200
                    hover:bg-gray-400
                    "
                    wire:click="daily_task()"
                    >
                        Daily Tasks
                    </button>
                

            </div>
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
