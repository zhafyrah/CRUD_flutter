<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::all();
        return view('produk.index', compact(['produk']));
    }

    public function create()
    {
        return view('produk.tambah');
    }

    public function store(Request $request)
    {
        ProdukModel::create($request->all());
        return redirect('/produk');
    }
}
