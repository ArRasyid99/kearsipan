<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Document;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalArsip = Document::count();
        $totalPinjam = Borrowing::count();
        $totalHapus = Document::where('deleted_at')->count();
        $arsipAktif = Document::with('label')->where('labels_id',1)->count();
        $arsipInaktif = Document::with('label')->where('labels_id',2)->count();
        $arsipVital = Document::with('label')->where('labels_id',3)->count();
        $arsipStatis = Document::with('label')->where('labels_id',4)->count();
        return view('dashboard', compact('totalArsip','totalPinjam','totalHapus','arsipAktif','arsipInaktif','arsipVital','arsipStatis'));
    }
}
