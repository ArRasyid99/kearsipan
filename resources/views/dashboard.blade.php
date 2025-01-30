<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-4 lg:p-8 bg-gray-100 border-b border-gray-300">


                    <h1 class="mt-1 text-2xl font-medium text-gray-900">
                        Manajemen Arsip
                    </h1>

                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <div class='inline-flex items-center px-4 py-6 '>
                                <div class=" w-60 h-40 bg-white rounded-lg shadow-md p-6 text-center">
                                    <h1 class="text-4xl font-bold text-black">{{ $totalArsip }}</h1>
                                    <p class="text-gray-600 font-medium mt-2">KOLEKSI ARSIP</p>
                                </div>
                            </div>

                            <div class='inline-flex items-center px-4 py-6 '>
                                <div class=" w-60 h-40 bg-white rounded-lg shadow-md p-6 text-center">
                                    <h1 class="text-4xl font-bold text-black">{{ $arsipDinamis }}</h1>
                                    <p class="text-gray-600 font-medium mt-2">ARSIP DINAMIS</p>
                                </div>
                            </div>


                            <div class='inline-flex items-center px-4 py-6 '>
                                <div class="w-60 h-40 bg-white rounded-lg shadow-md p-6 text-center">
                                    <h1 class="text-4xl font-bold text-black">{{ $arsipAktif }}</h1>
                                    <p class="text-gray-600 font-medium mt-2">ARSIP AKTIF</p>
                                </div>
                            </div>

                            <div class='inline-flex items-center px-4 py-6 '>
                                <div class="w-60 h-40 bg-white rounded-lg shadow-md p-6 text-center">
                                    <h1 class="text-4xl font-bold text-black">{{ $arsipInaktif }}</h1>
                                    <p class="text-gray-600 font-medium mt-2">ARSIP INAKTIF</p>
                                </div>
                            </div>


                    </div>

                    <div class="flex flex-wrap">
                        <div class="w-full">

                            <div class='inline-flex items-center px-4 py-6 '>
                                <div class="w-60 h-40 bg-white rounded-lg shadow-md p-6 text-center">
                                    <h1 class="text-4xl font-bold text-black">{{ $arsipStatis }}</h1>
                                    <p class="text-gray-600 font-medium mt-2">ARSIP STATIS</p>
                                </div>
                            </div>

                            <div class='inline-flex items-center px-4 py-6 '>
                                <div class="w-60 h-40 bg-white rounded-lg shadow-md p-6 text-center">
                                    <h1 class="text-4xl font-bold text-black">{{ $arsipVital }}</h1>
                                    <p class="text-gray-600 font-medium mt-2">ARSIP VITAL</p>
                                </div>
                            </div>

                            <div class='inline-flex items-center px-4 py-6 '>
                                <div class="w-60 h-40 bg-white rounded-lg shadow-md p-6 text-center">
                                    <h1 class="text-4xl font-bold text-black">{{ $totalPinjam }}</h1>
                                    <p class="text-gray-600 font-medium mt-2">ARSIP DIPINJAM</p>
                                </div>
                            </div>



                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
