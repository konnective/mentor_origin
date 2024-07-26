<x-layout>
    <div>

        {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
        <div class="container p-8 mx-auto mt-12 bg-white">
            <div class="w-full overflow-x-auto">
                <table class="w-full shadow-inner">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Date</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Day</th>
                            <th class="px-6 py-3 font-bold whitespace-nowrap">Cycles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($points) == 0)
                            <tr>
                                <td>
                                    No data to show
                                </td>
                            </tr>
                        @endif
                        @foreach ($points as $task)
                            <tr>
                                <td class="p-4 px-6 text-center whitespace-nowrap">{{ $task->date }}</td>
                                <td class="p-4 px-6 text-center whitespace-nowrap">
                                    <div>
                                        {{-- <button class="px-2 py-0 shadow" wire:click="">-</button> --}}
                                        <input type="text" name="qty" value="{{ $task->day }}"
                                            class="text-center bg-gray-100 outline-none" />
                                        {{-- <button class="px-2 py-0 shadow" wire:click="">+</button> --}}
                                    </div>
                                </td>
                                <td class="p-4 px-6 text-center whitespace-nowrap">
                                    <button class="px-2 py-0 text-red-100 bg-blue-600 rounded">
                                        {{ $task->cycles }}
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

</x-layout>
