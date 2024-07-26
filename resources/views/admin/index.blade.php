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
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Task name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Day
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-lg">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    info
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    em
                                </th>

                                <td class="px-6 py-4">
                                    info
                                </td>
                                <td class="py-4">
                                    <button data-modal-hide="popup-modal" id="delPro" type="submit"
                                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Completed
                                    </button>
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="right_info  flex-1 p-15 bg-gray-50 overflow-x-auto shadow-md sm:rounded-lg">
                <div class="bg-red-50">
                    Profile
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
                                Product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                dropdown
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 text-lg">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                info
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                em
                            </th>

                            <td class="px-6 py-4">
                                info
                            </td>
                            <td class="px-6 py-4">
                                <a href="#" class="font-medium  text-blue-600 dark:text-blue-500 hover:underline">
                                    <button
                                        class="inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Trash
                                    </button></a>

                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" data-id="1"
                                    class="delBtn inline text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Completed
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>



    </div>
</x-layout>
