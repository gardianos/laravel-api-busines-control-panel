<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Company;
use App\Module;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'company' => 'required|string|max:255',
            'type' => 'required|integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // get the current time
        $trialStart = Carbon::now();

        // add 7 days to the current time
        $trialEnd = $trialStart->addDays(7);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'kinventory' => 1,
            'kclients' => 1,
            'ksuppliers' => 1,
            'kassistant' => 1,
            'kpos' => 1,
            'init' => 0,
        ]);

        $company = Company::create([
            'name' => $data['company'],
            'type' => $data['type'],
        ]);

        $module = Module::create([
            'kinventory' => $trialEnd,
            'kclients' => $trialEnd,
            'ksuppliers' => $trialEnd,
            'kassistant' => $trialEnd,
            'kpos' => $trialEnd,
        ]);

       DB::table('companies_user')->insert(
            [
                'company_id' => $company->id, 
                'user_id' => $user->id,
            ]
        );

         DB::table('modules_user')->insert(
            [
                'module_id' => $module->id, 
                'user_id' => $user->id,
            ]
        );

        return $user;
       
    }
}
