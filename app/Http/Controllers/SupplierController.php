<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index($userId)
    {   
        $suppliers = DB::table($userId.'_suppliers')->get();

        return $suppliers;
    }

    public function show($userId,$supplierId)
    {
        $supplier = DB::table($userId.'_suppliers')->where('id', '=', $supplierId)->get();

        return $supplier;
    }

    public function save(Request $request)
    {   
        /* get the post data */
        $userId = $request->userId;
        $supplierName = $request->name;
        $supplierManager = $request->manager;
        $supplierPhone = $request->phone;
        $supplierEmail = $request->email;

        DB::table($userId.'_suppliers')->insert([
            [
                'name' => $supplierName, 
                'manager' => $supplierManager,
                'phone' => $supplierPhone,
                'email' => $supplierEmail
            ]
        ]);

        return response()->json("success", 201);
    }

    public function update(Request $request)
    {
        $userId = $request->userId;
        $supplierName = $request->name;
        $supplierManager = $request->manager;
        $supplierPhone = $request->phone;
        $supplierEmail = $request->email;

        DB::table($userId.'_suppliers')
            ->where('id', $supplierId)
            ->update([
                'name' => $supplierName, 
                'manager' => $supplierManager,
                'phone' => $supplierPhone,
                'email' => $supplierEmail
                
                ]);

        return response()->json("updated", 200);
    }

    public function delete($userId,$supplierId)
    {
        DB::table($userId.'_suppliers')->where('id', '=', $supplierId)->delete();

        return response()->json("deleted", 204);
    }
}
