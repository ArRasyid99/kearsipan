<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Arsip') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>

            $(document).ready(function () {
                $('#crudTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('aktif.index') }}",

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

                        { data: 'title', name: 'title' },
                        { data: 'label.name', name: 'label.name' },
                        { data: 'category.name', name: 'category.name' },
                        { data: 'description', name: 'description' },
                        { data: 'directory', name: 'directory' },
                        { data: 'action', name: 'action', orderable: false, searchable: false },
                    ],
                });
            });
        </script>
    </x-slot>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">

                     <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <table id="crudTable">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Label</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Penyimpanan</th>
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
