<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Borrowing;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalArsip = Document::withoutTrashed()->count();
        $totalPinjam = Borrowing::count();
        $arsipDinamis = Document::with('label')->where('labels_id',1)->count();
        $arsipAktif = Document::with('label')->where('labels_id',2)->count();
        $arsipInaktif = Document::with('label')->where('labels_id',3)->count();
        $arsipStatis = Document::with('label')->where('labels_id',4)->count();
        $arsipVital = Document::with('label')->where('labels_id',5)->count();

        return view('dashboard', compact('totalArsip','totalPinjam','arsipDinamis','arsipAktif','arsipInaktif','arsipStatis','arsipVital'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(RegisterRequest $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dashboard.index');
    }
}
