<?php

namespace Modules\PPDB\Http\Controllers;

use App\Models\User;
use App\Models\Footer;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Perpustakaan\Entities\Book;
use Illuminate\Contracts\Support\Renderable;

class PPDBController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $footer = Footer::first();
        $guru = User::where('role', 'Guru')->count();
        $murid = User::where('role', 'Murid')->count();
        $buku = Book::count();
        $mapel = Jurusan::count();


        return view('ppdb::index', compact('footer', 'guru', 'murid','buku','mapel'));
    }

    
}
