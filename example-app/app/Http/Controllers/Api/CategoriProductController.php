<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoriProduct;
use Illuminate\Http\Request;


class CategoriProductController extends Controller
{
    //
    public function index(){
        $category_product=CategoriProduct::all();
        return response()->json($category_product);
    }

    public function store(Request $request){
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
    }

    public function show($id){
        $category=CategoriProduct::find($id);
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
