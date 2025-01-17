<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Category::latest()->get();
            return DataTables::of($data)

                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    $btn = '<a href="' . route('category.edit', $item->id) . '" class="border border-red-500 bg-gray-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-gray-600 focus:outline-none focus:shadow-outline">Edit</a>';
                    $btn .= ' <a href="' . route('category.destroy', $item->id) . '" class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        } //get posts


         //render view with posts
         return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
