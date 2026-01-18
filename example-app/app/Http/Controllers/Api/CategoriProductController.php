<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriProduct;
use Illuminate\Http\Request;


class CategoriProductController extends Controller
{
    //
    public function index(){
        try{
            $product_categories = CategoriProduct::get();
            return response()->json([
            'data'=>$product_categories,
        ],200);

        } catch (\Exception $e) {
            return response()->json([
                'status'=>'Error',
                'message'=>$e->getMessage(),
            ],500);
        }
    }

    public function store(Request $request){

        try{    
            $validateData=$request->validate([
                'name'=>'required|max:255',
                'description'=>'required|string',
            ]);
    
            $category_product=CategoriProduct::create($validateData);
            return response()->json([
                'status'=>'Succes',
                'data'=>$category_product,
                'message'=>'Berhasil disimpan',
            ],201);

        } catch (\Exception $e) {
            return response()->json([
                'status'=>'Error',
                'message'=>$e->getMessage(),
            ],500);
        }
    }

    public function show($id){
        $category=CategoriProduct::findorfail($id);
        return response()->json([
            'status'=>'Succes',
            'data'=>$category,
            'message'=>'Berhasil diambil',
        ],200);
        if(!$category){
            return response()->json([
                'message'=>'Tidak ada data',
                'data'=>null
            ],401); 
        }
    }

    public function update(Request $request,$id){
        $category=CategoriProduct::find($id);
        $validate=$request->validate([
            'name'=>'required|max:255',
            'description'=>'required|string'
        ]);
        $category->update([
            'name'=>$validate['name'],
            'description'=>$validate['description'],
        ]);
        return response()->json([
            'status'=>'succes',
            'data'=>$category,
            'message'=>'Berhasil diupdate',
        ]);
    }

    public function destroy($id){
        $category=CategoriProduct::find($id);
        $category->delete();
        return response([
            'status'=>'Berhasil',
            'data'=>$category,
            'message'=>'Data berhasil dihapus!!!',
        ],201);

    }

}
