<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class PosController extends Controller
{
    public function shoppingCart(Request $request){

        
        $names = $request->pos_cart_item;
        $quantity = $request->pos_cart_item_quantity;
        $price = $request->pos_cart_item_price;

        $itemCount = count($names);
        $priceCount = count($price);

        $totalCost = 0;

        $userId = Auth::user()->id;
        $receiptId = $userId.time();

        for($i = 0 ; $i < $itemCount; $i++){
            
            DB::table($userId.'_clients_billing')->insert([
                [
                    'article' => $names[$i], 
                    'quantity' => $quantity[$i],
                    'cost' => $price[$i],
                    'receipt_id' => $receiptId
                ]
            ]);
        }

        for($j = 0; $j < $priceCount; $j++){

            $totalCost += $price[$j];
        }

        DB::table($userId.'_clients_receipt')->insert([
            [
                'client_id' => 'POS', 
                'receipt_id' => $receiptId,
                'totalcost' => $totalCost
            ]
        ]);

        $request->session()->flash('receipt-success','was added successfully');

       return redirect()->route('view-receipt', ['id' => $receiptId]);
    }

    public function viewReceipt($id){

        $userId = Auth::user()->id;

        $articles = DB::table($userId.'_clients_billing')->where('receipt_id', '=', $id)->get();
        $receipt = DB::table($userId.'_clients_receipt')->where('receipt_id', '=', $id)->first();

        $pdf = PDF::loadView('receipt', compact('articles','receipt'));
        return $pdf->download('receipt-alpha.pdf');

    }

}
