<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News Details') }}
        </h2>
    </x-slot>

    <div class="overflow-hidden bg-white py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
                <div class="lg:pr-8 lg:pt-4">
                    <div class="lg:max-w-lg">
                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $allData->title }}</p>
                        <div class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                            <dl>

                                <h2 class="font-bold text-2xl">News Title:</h2>
                                <dd class="inline text-lg font-semibold leading-8 text-gray-600">{{ $allData->description }}</dd>

                            </dl>
                        </div>

                        <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                            <div class="relative pl-9">
                                <h2 class="font-bold text-2xl">News Letter:</h2>
                                <dd class="inline">{{ $allData->paragraph }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
                <img src="{{  (!empty($allData->image))? url('upload/news/'.$allData->image):url('upload/no_image.jpg') }}" alt="Image">
            </div>
        </div>
    </div>

</x-app-layout>
