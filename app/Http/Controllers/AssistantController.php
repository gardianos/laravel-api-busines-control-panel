<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AssistantController extends Controller
{
    
    public function sendGoods(Request $request){

        $client = $request->send_goods_client_name;
        $names = $request->send_goods_name;
        $quantity = $request->send_goods_quantity;

        $itemCount = count($names);

        $userId = Auth::user()->id;
        $receiptId = $userId.time();

        for($i = 0 ; $i < $itemCount; $i++){
            
            DB::table($userId.'_clients_billing')->insert([
                [
                    'article' => $names[$i], 
                    'quantity' => $quantity[$i],
                    'cost' => '0',
                    'receipt_id' => $receiptId
                ]
            ]);
        }

        DB::table($userId.'_clients_receipt')->insert([
            [
                'client_id' => $client, 
                'receipt_id' => $receiptId,
                'totalcost' => '0'
            ]
        ]);

        $request->session()->flash('receipt-success','was added successfully');

       return redirect()->back();
    }
}
