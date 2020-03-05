<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index($userId)
    {   
        $articles = DB::table($userId.'_inventory')->get();

        return $articles;
    }

    public function show($userId,$articleId)
    {
        $article = DB::table($userId.'_inventory')->where('id', '=', $articleId)->get();

        return $article;
    }

    public function save(Request $request)
    {   
        /* get the post data */
        $userId = $request->userId;
        $articleName = $request->name;
        $articlePrice = $request->price;
        $articleQuantity = $request->quantity;
        $articleBarcode = $request->barcode;
        $articleCategory = $request->category;

        DB::table($userId.'_inventory')->insert([
            [
                'name' => $articleName,
                'price' => $articlePrice, 
                'barcode' => $articleBarcode,
                'quantity' => $articleQuantity,
                'category' => $articleCategory
            ]
        ]);

        return response()->json("success", 201);
    }

    public function update(Request $request)
    {
        $userId = $request->userId;
        $articleId = $request->articleId;
        $categoryId = $request->category;
        $newName = $request->name;
        $newPrice = $request->price;
        $newBarcode = $request->barcode;
        $newQuantity = $request->quantity;
        /* get category by id*/
        $newCategory = DB::table($userId.'_inventory_category')->where('id', '=', $categoryId)->get();
        

        DB::table($userId.'_inventory')
            ->where('id', $articleId)
            ->update([
                'name' => $newName ,
                'price' => $newPrice,
                'barcode' => $newBarcode,
                'quantity' => $newQuantity,
                'category' => $newCategory
                ]);

        return response()->json("updated", 200);
    }

    public function delete($userId,$articleId)
    {
        DB::table($userId.'_inventory')->where('id', '=', $articleId)->delete();

        return response()->json("deleted", 204);
    }

    public function catArticle($userId,$catId){

        $category = DB::table($userId.'_inventory_category')->where('id', '=' , $catId)->get();
        
        foreach($category as $cat){

            $newName = $cat->name;
        }

        $articles = DB::table($userId.'_inventory')->where('category','=', $newName)->get();

        return $articles;

    }

    public function searchArticle($userId, $keyword){

        $articles = DB::table($userId.'_inventory')->where('name', 'LIKE', '%'. $keyword . '%')->get();

        return $articles;
    }
}
