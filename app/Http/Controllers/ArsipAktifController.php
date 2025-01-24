<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Category;
use App\Models\Document;
use App\Models\Label;

use Yajra\DataTables\DataTables;

class ArsipAktifController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Document::with('category','label')->where('labels_id',1)->get();
            return DataTables::of($data)

                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <form class="inline-block" action="' . route('aktif.show', $data->id) . '" method="GET">
                    <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-green-500 focus:outline-none focus:shadow-outline" >
                           Lihat
                       </button>

                   </form>';
                    $btn .= ' <form class="inline-block" action="' . route('aktif.edit', $data->id) . '" method="GET">
                    <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-green-500 focus:outline-none focus:shadow-outline" >
                           Edit
                       </button>

                   </form>';
                    $btn .= ' <form class="inline-block" action="' . route('aktif.destroy', $data->id) . '" method="POST">
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
         return view('aktif.index');
    }

     /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Document::findOrFail($id); // Ambil data berdasarkan ID
        $labels = Label::all();
        $categories = Category::all();
        return view('arsip.detail', compact('data','labels','categories')); // Kirim data ke view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Document::findOrFail($id); // Ambil data berdasarkan ID
        $labels = Label::all();
        $categories = Category::all();
        return view('arsip.edit', compact('data','labels','categories')); // Kirim data ke view
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $document = Document::find($id);

        $document->delete();

        return redirect()->route('aktif.index');
    }


}
