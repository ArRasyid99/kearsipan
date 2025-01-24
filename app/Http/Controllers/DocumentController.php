<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Category;
use App\Models\Document;
use App\Models\Label;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::all();
        $categories = Category::all();

        return view('pendataan.index', compact('labels','categories'));
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
    public function store(DocumentRequest $request)
    {
        $data = $request->all();
        $labels = Label::all();
        $categories = Category::all();

        Document::create($data);

        return view('pendataan.index', compact('labels','categories'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Document::findOrFail($id); // Ambil data berdasarkan ID
        return view('arsip.detail', compact('data'));
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
    public function update(DocumentRequest $request, $id)
    {
        $document= Document::findOrFail($id);

        $document->update([
        'title' => $request->title,
        'labels_id' => $request->labels_id,
        'categories_id' => $request->categories_id,
        'description' => $request->description,
        'directory' => $request->directory,

    ]);

        return redirect()->route('dashboard');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $document = Document::find($id);

        $document->delete();

        return redirect()->route('dashboard');
    }
}
