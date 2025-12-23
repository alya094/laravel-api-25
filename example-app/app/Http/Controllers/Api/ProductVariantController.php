<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product_variants=ProductVariant::all();
        return response()->json([
            'status'=>'Succes',
            'data'=>$product_variants,
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
        //
        try {
            $validateData=$request->validate([
                'name'=>'required|max:255',
                'product_id'=>'required|exists:products,id',
                'description'=>'required|string',
            ]);
            $product_variant=ProductVariant::create($validateData);
            return response()->json([
                'status'=>'Succes',
                'data'=>$product_variant,
                'message'=>'Berhasil disimpan',
            ],201);
        } catch (\Exception $e) {
            return response()->json([
                'status'=>'Error',
                'message'=>$e->getMessage(),
            ],500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product_variant=ProductVariant::findorfail($id);
        return response()->json([
            'status'=>'Succes',
            'data'=>$product_variant,
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
        $product_variant=ProductVariant::find($id);
        $validate=$request->validate([
            'name'=>'required|max:255',
            'product_id'=>'required|exists:products,id',
            'description'=>'required|string',
        ]);
        $product_variant->update($validate);
        return response()->json([
            'status'=>'Succes',
            'data'=>$product_variant,
            'message'=>'Berhasil diupdate',
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product_variant=ProductVariant::find($id);
        $product_variant->delete();
        return response()->json([
            'status'=>'Succes',
            'data'=>$product_variant,
            'message'=>'Berhasil dihapus',
        ],200); 

    $product_variant->delete();
    return response()->json(['message'=>'Berhasil dihapus'],200);

    }
}
