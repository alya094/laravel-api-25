<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products=Product::all();
        return response()->json([
            'status'=>'Succes',
            'data'=>$products,
            'message'=>'Berhasil diambil',
        ],200);
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
        try {
             $validateData=$request->validate([
            'name'=>'required|max:255',
            'product_category_id'=>'required|exists:categori_products,id',
            'description'=>'required|string',
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'Error',
                'message'=>$e->getMessage(),
            ],500);
        }
        $product=Product::create($validateData);
        return response()->json([
            'status'=>'Succes',
            'data'=>$product,
            'message'=>'Berhasil disimpan',
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product=Product::findorfail($id);
        return response()->json([
            'status'=>'Succes',
            'data'=>$product,
            'message'=>'Berhasil diambil',
        ],200);
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
        $product=Product::find($id);
        $validate=$request->validate([
            'name'=>'required|max:255',
            'code'=>'required',
        ]);
        $product->update([
            'name'=>$validate['name'],
            'code'=>$validate['code'],
        ]);
        return response()->json([
            'status'=>'Succes',
            'data'=>$product,
            'message'=>'Berhasil diupdate',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product=Product::find($id);
        $product->delete();
        return response()->json([
            'status'=>'Succes',
            'data'=>$product,
            'message'=>'Berhasil dihapus',
        ],200);
    }
}
