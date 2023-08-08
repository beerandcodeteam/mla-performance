<div class="bg-gray-900 rounded-lg">
    <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-1 gap-px bg-white/5 sm:grid-cols-2 lg:grid-cols-4">

            @foreach($statusCount as $status => $count)

                <div @class([
                    "bg-gray-900 px-4 py-6 sm:px-6 lg:px-8",
                    "rounded-l-lg" => $loop->first,
                    "rounded-r-lg" => $loop->iteration == 4
                ])>
                    <p class="text-sm font-medium leading-6 text-gray-400">{{ $status }}</p>
                    <p class="mt-2 flex items-baseline gap-x-2">
                        <span class="text-4xl font-semibold tracking-tight text-white">{{ $count }}</span>
                    </p>
                </div>
            @endforeach



        </div>
    </div>
</div>
