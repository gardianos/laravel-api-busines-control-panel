<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index($userId)
    {   
        $clients = DB::table($userId.'_clients')->get();

        return $clients;
    }

    public function show($userId,$clientId)
    {
        $client = DB::table($userId.'_clients')->where('id', '=', $clientId)->get();

        return $client;
    }

    public function save(Request $request)
    {   
        /* get the post data */
        $userId = $request->userId;
        $clientName = $request->name;
        $clientSurname = $request->surname;
        $clientCompany = $request->company;
        $clientPhone = $request->phone;
        $clientAddress = $request->address;
        $clientEmail = $request->email;
        $clientPurchases = '0';

        DB::table($userId.'_clients')->insert([
            [
                'name' => $clientName, 
                'surname' => $clientSurname,
                'company' => $clientCompany,
                'phone' => $clientPhone,
                'address' => $clientAddress,
                'email' => $clientEmail,
                'totalpurchases' => $clientPurchases
            ]
        ]);

        return response()->json("success", 201);
    }

    public function update(Request $request)
    {
        $userId = $request->userId;
        $clientId = $request->clientId;
        $clientName = $request->name;
        $clientSurname = $request->surname;
        $clientCompany = $request->company;
        $clientPhone = $request->phone;
        $clientAddress = $request->address;
        $clientEmail = $request->email;

        DB::table($userId.'_clients')
            ->where('id', $clientId)
            ->update([
                'name' => $clientName, 
                'surname' => $clientSurname,
                'company' => $clientCompany,
                'phone' => $clientPhone,
                'address' => $clientAddress,
                'email' => $clientEmail
                
                ]);

        return response()->json("updated", 200);
    }

    public function delete($userId,$clientId)
    {
        DB::table($userId.'_clients')->where('id', '=', $clientId)->delete();

        return response()->json("deleted", 204);
    }

    public function getClientsDebt($userId){

        $clients = DB::table($userId.'_clients_debt')->get();

        return $clients;
    }

    public function getClientsDebtSingle($userId, $clientId){
        $client = DB::table($userId.'_clients_debt')->where('id', '=', $clientId)->get();

        return $client;
    }

    /* laravel web routes */

    public function addDebt(Request $request){

        $userId = Auth::user()->id;

        /* get the post data */
        $clientName = $request->debt_name;
        $clientSurname = $request->debt_surname;
        $clientPhone = $request->debt_phone;
        $clientDebt = $request->debt_amount;
        $clientDuedate = $request->debt_duedate;

        DB::table($userId.'_clients_debt')->insert([
            [
                'name' => $clientName, 
                'surname' => $clientSurname,
                'phone' => $clientPhone,
                'debt' => $clientDebt,
                'duedate' => $clientDuedate
            ]
        ]);

        $request->session()->flash('debt-success','was added successfully');

        return redirect()->back();

    }
}
