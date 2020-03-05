<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\User;
class BaseController extends Controller
{
    
    public function init($userId){

        $user = User::find($userId);
        $user->init = 1;
        $user->save();

        /* create the modules tables respectively for the user */

        /* Inventory module tables */
        Schema::create($userId.'_inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('price', 8,2);
            $table->string('barcode');
            $table->integer('quantity');
            $table->string('category');
            $table->timestamps();
        });
        Schema::create($userId.'_inventory_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('total_items');
            $table->timestamps();
        });

        /* Clients module tables */
        Schema::create($userId.'_clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('company');
            $table->string('phone');
            $table->string('address');
            $table->string('email');
            $table->string('totalpurchases');
            $table->timestamps();
        });
        /* Client receipts */
        Schema::create($userId.'_clients_receipt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_id')->nullable();
            $table->string('receipt_id');
            $table->string('totalcost');
            $table->timestamps();
        });
        /* Clients billing */
        Schema::create($userId.'_clients_billing', function (Blueprint $table){

            $table->increments('id');
            $table->string('article');
            $table->string('quantity');
            $table->string('cost');
            $table->string('receipt_id');

        });

        /* Client debt */
        Schema::create($userId.'_clients_debt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->string('debt');
            $table->date('duedate');
            $table->string('client_id')->nullable();
            $table->timestamps();
        });
        /* Suppliers table*/
        Schema::create($userId.'_suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('manager');
            $table->string('phone');
            $table->string('email');
            $table->timestamps();
        });



        return redirect()->back();
    }
}
