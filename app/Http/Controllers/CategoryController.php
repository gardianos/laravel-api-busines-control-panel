<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($userId)
    {   
        $categories = DB::table($userId.'_inventory_category')->get();

        return $categories;
    }

    public function show($userId,$categoryId)
    {
        $category = DB::table($userId.'_inventory_category')->where('id', '=', $categoryId)->get();

        return $category;
    }

    public function save(Request $request)
    {   
        /* get the post data */
        $userId = $request->userId;
        $catName = $request->name;

        DB::table($userId.'_inventory_category')->insert([
            ['name' => $catName, 'total_items' => 0]
        ]);

        return response()->json("success", 201);
    }

    public function update(Request $request)
    {
        $userId = $request->userId;
        $categoryId = $request->categoryId;
        $newName = $request->name;
        $newTotal = $request->total;

        DB::table($userId.'_inventory_category')
            ->where('id', $categoryId)
            ->update(['name' => $newName , 'total_items' => $newTotal]);

        return response()->json("updated", 200);
    }

    public function delete($userId,$categoryId)
    {
        DB::table($userId.'_inventory_category')->where('id', '=', $categoryId)->delete();

        return response()->json("deleted", 204);
    }
}
