<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $userId = Auth::user()->id;

        try{
            $debts = DB::table($userId.'_clients_debt')->get();
            $receipts = DB::table($userId.'_clients_receipt')->get();
            $articles = DB::table($userId.'_inventory')->get();
            return view('loggedin.index')->with('debts', $debts)
                                         ->with('receipts', $receipts)
                                         ->with('articles', $articles);
        }catch(\Exception $e){

            return view('loggedin.index');
        }

    }
}
