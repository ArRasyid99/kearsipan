<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>

            $(document).ready(function () {
                $('#crudTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('peminjaman.index') }}",

                    columns: [
                        {
                          data: null, // Kolom untuk nomor
                             render: function (data, type, row, meta)
                             {
                             return meta.row + 1; // Penomoran berdasarkan index row
                             },
                                orderable: false,
                                searchable: false
                                                    },

                        { data: 'name', name: 'name' },
                        { data: 'document.title', name: 'document.title' },
                        { data: 'document.archive_number', name: 'document.archive_number' },

                        {
                          data: 'borrow_date', // Kolom `created_at`
                            render: function (data) {
                            return moment(data).format('DD-MM-YYYY'); // Format: 19-01-2025 15:30:45
                            }
                                                    },


                        { data: 'action', name: 'action', orderable: false, searchable: false },
                    ],
                });
            });
        </script>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex flex-wrap -mx-3 mb-10">
                <div class="w-full px-3 ">
                    <a href="{{ route('peminjaman.create') }}"  class= " bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                        + Tambah Peminjaman
                    </a>
                    <a href="{{ route('peminjaman.recent') }}"  class= "ml-3 bg-gray-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                        Riwayat Peminjaman
                    </a>
                </div>
            </div>

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">

                     <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <table id="crudTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Arsip</th>
                                    <th>Nomor</th>
                                    <th>Tanggal Pinjam</th>

                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
