<x-layout>
    <div>

        {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <div class="container p-8 mx-auto mt-12 bg-white">
            <div class="w-full overflow-x-auto">
                <div class="my-2">
                    <h3 class="text-xl font-bold tracking-wider">number Items are {{ count($projects) }}</h3>
                </div>
                <div class="my-2">
                    <a href="{{ $path . '/project/add' }}" class="bg-black text-white my-2 py-2 px-5">Add
                        Project</a>
                </div>
                <table class="w-full shadow-inner">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Task Name</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Days</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Cycles</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">End Date</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $task)
                            <tr>
                                <td class="p-4 px-6 text-center whitespace-nowrap">{{ $task->name }}</td>
                                <td class="p-4 px-6 text-center whitespace-nowrap">
                                    <div>
                                        {{-- <button class="px-2 py-0 shadow" wire:click="">-</button> --}}
                                        <input type="text" name="qty" value="{{ $task->days }}"
                                            class="w-12 text-center bg-gray-100 outline-none" />
                                        {{-- <button class="px-2 py-0 shadow" wire:click="">+</button> --}}
                                    </div>
                                </td>
                                <td class="p-4 px-6 text-center whitespace-nowrap">
                                    <button class="px-2 py-0 text-red-100 bg-blue-600 rounded">
                                        {{ $task->cycles }}
                                    </button>
                                </td>
                                <td class="p-4 px-6 text-center whitespace-nowrap">
                                    <button id="complete" class="px-2 py-0 text-red-100 bg-green-600 rounded">
                                        {{ $task->end_date == null ? 'not given' : $task->end_date }}
                                    </button>
                                </td>
                                <td class="p-4 px-6 text-center whitespace-nowrap">
                                    <a href="{{ $path . '/tasks/' . $task->id }}">
                                        <button id="view_btn" class="px-2 py-0 text-red-100 bg-red-600 rounded">
                                            View
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>

                        </tr>
                    </tbody>
                </table>
                {{-- <div class="flex justify-end mt-4 space-x-2">
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
                        wire:click="daily_task()">
                        Daily Tasks
                    </button>


                </div> --}}
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

</x-layout>
