<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukAPIController extends Controller
{
    public function index()
    {
        $produk = ProdukModel::all();
        return response()->json(['message' => 'Success', 'data' => $produk]);
    }

    public function show($id)
    {
        $produkModel = ProdukModel::find($id);
        return response()->json(['message' => 'Success', 'data' => $produkModel]);
    }

    public function store(Request $request)
    {
        $produkModel = ProdukModel::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $produkModel]);
    }

    public function update(Request $request, $id)
    {
        $produkModel = ProdukModel::find($id);
        return response()->json(['message' => 'Success', 'data' => $produkModel]);
    }

    public function destroy($id)
    {
        $produk = ProdukModel::find($id);
        $produk->delete();
        return response()->json(['message' => 'Success', 'data' => null]);
    }
}
