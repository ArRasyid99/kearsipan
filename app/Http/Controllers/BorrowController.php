<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowingRequest;
use App\Models\Borrowing;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Borrowing::with('user','document')->where('status','Dipinjam')->get();;
            return DataTables::of($data)

                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <form class="inline-block" action="' . route('peminjaman.return', $data->id) . '" method="POST">
                    <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-blue-500 focus:outline-none focus:shadow-outline" >
                        Selesai
                       </button>
                     ' . method_field('post') . csrf_field() . '

                   </form>';
                   $btn .= ' <form class="inline-block" action="' . route('peminjaman.show', $data) . '" method="GET">

                   <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-green-500 focus:outline-none focus:shadow-outline" >
                       Lihat
                      </button>

                  </form>';
                    $btn .= ' <form class="inline-block" action="' . route('peminjaman.edit', $data) . '" method="GET">

                    <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-green-500 focus:outline-none focus:shadow-outline" >
                        Ubah
                       </button>

                   </form>';
                    $btn .= ' <form class="inline-block" action="' . route('peminjaman.destroy', $data->id) . '" method="POST">
                     <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-500 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                         ' . method_field('delete') . csrf_field() . '
                    </form>';
                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        } //get posts


         //render view with posts
         return view('peminjaman.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $documents = Document::all();


        return view('peminjaman.create', compact('documents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BorrowingRequest $request)
    {
        $data = $request->all();
        $documents = Document::all();
        $users = User::all();

        Borrowing::create($data);

        return view('peminjaman.index', compact('data','documents','users'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Borrowing::findOrFail($id); // Ambil data berdasarkan ID
        $documents = Document::all();
        return view('peminjaman.detail', compact('data','documents')); // Kirim data ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Borrowing::findOrFail($id); // Ambil data berdasarkan ID
        $documents = Document::all();
        return view('peminjaman.edit', compact('data','documents')); // Kirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BorrowingRequest $request, $id)
    {
        $borrowing= Borrowing::findOrFail($id);

        $borrowing->update([
        'name' => $request->name,
        'documents_id' => $request->documents_id,
        'status' => $request->status,
        'borrow_date' => $request->borrow_date,
        'return_date' => $request->return_date,
        'users_id' => $request->users_id,
    ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    public function return( $id)
    {
        $borrowing= Borrowing::findOrFail($id);
        $borrowing->update([
        'status' => 'Dikembalikan',
        'return_date' => now(),
    ]);

        return redirect()->route('peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $borrowings = Borrowing::find($id);

        $borrowings->delete();

        return redirect()->route('peminjaman.index');
    }

    public function recent()
    {
        if (request()->ajax()) {
            $data = Borrowing::with('user','document')->where('status','Dikembalikan')->get();;
            return DataTables::of($data)


                ->make(true);
        } //get posts


         //render view with posts
         return view('peminjaman.recent');
    }
}
