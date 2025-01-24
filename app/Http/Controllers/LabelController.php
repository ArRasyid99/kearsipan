<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Models\label;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Label::latest()->get();
            return DataTables::of($data)

                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = ' <form class="inline-block" action="' . route('label.edit', $data->id) . '" method="GET">
                     <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-green-500 focus:outline-none focus:shadow-outline" >
                            Edit
                        </button>
                    
                    </form>';
                    $btn .= ' <form class="inline-block" action="' . route('label.destroy', $data->id) . '" method="POST">
                     <button  class="border border-gray-500 bg-white-500 text-black rounded-md px-1 py-1 m-2 transition duration-500 ease select-none hover:bg-red-500 focus:outline-none focus:shadow-outline" >
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
         return view('label.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('label.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LabelRequest $request)
    {
        $data = $request->all();

        Label::create($data);

        return redirect()->route('label.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(label $label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(label $label)
    {
        return view('label.edit',[
            'data' => $label
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LabelRequest $request, label $label)
    {
        $data = $request->all();

        $label->update($data);

        return redirect()->route('label.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(label $label)
    {
        $label->delete();

        return redirect()->route('label.index');
    }
}
