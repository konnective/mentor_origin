@props(['item'])

<x-card>
    <div class="">
        {{-- <img class="hidden w-48 mr-6 md:block" src="{{ asset('images/no-image.png') }}" alt="" /> --}}
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $item->id }}">{{ $item->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $item->price }}</div>
            <ul class=" ">
                <li class=" items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                    <a href="#">Add to card</a>
                </li>

            </ul>
        </div>
    </div>
</x-card>
