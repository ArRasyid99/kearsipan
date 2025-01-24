<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

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
                ->addColumn('action', function ($data) {
                    $btn = ' <form class="inline-block" action="' . route('category.edit', $data->id) . '" method="GET">
                    <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-green-500 focus:outline-none focus:shadow-outline" >
                           Edit
                       </button>

                   </form>';
                    $btn .= ' <form class="inline-block" action="' . route('category.destroy', $data->id) . '" method="POST">
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
         return view('category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        Category::create($data);

        return redirect()->route('category.index');
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
    public function edit(Category $category)
    {
        return view('category.edit',[
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category  $category)
    {
        $data = $request->all();

        $category->update($data);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index');
    }

}
