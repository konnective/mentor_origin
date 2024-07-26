@props(['item'])
<div class="card w-60 h-96 bg-slate-800 rounded-xl p-5">
    <div class="img-area">
        <img src="https://images.pexels.com/photos/335257/pexels-photo-335257.jpeg?cs=srgb&dl=pexels-eprism-studio-335257.jpg&fm=jpg"
            alt="product" class="rounded-lg">
    </div>
    <div class="text-area mt-6">
        <p class="rating text-gray-400">
            4.5 USA
        </p>
        <h3 class="name text-lg text-gray-300">{{ $item->title }}</h3>
        <p class="price text-xl text-gray-50 font-semibold">${{ $item->price }}</p>
    </div>
    <div class="btn m-2 flex justify-center">
        <button class="py-0.5 px-3 bg-blue-500 rounded-full text-white">Add to card</button>
    </div>
</div>
