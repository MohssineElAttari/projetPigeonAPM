<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\Gropement;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        // dd($data['type']);
            return Validator::make($data, [
                // 'logo' => ['required', 'string', 'max:255'],
                // 'nomAssociation' => ['required', 'string', 'max:255'],
                // 'abrevation' => ['required', 'string', 'max:255'],
                // 'nom-res' => ['required', 'string', 'max:255'],
                // 'pre-res' => ['required', 'string', 'max:255'],
                // 'pays' => ['required', 'string', 'max:255'],
                // 'ville' => ['required', 'string', 'max:255'],
                // 'adresse' => ['required', 'string', 'max:255'],
                // 'tel' => ['required', 'string', 'max:255'],
                // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // die($data);
        if($data['type']=="Association"){
        return Association::create([
            'nomAssociation' => $data['nomAssociation'],
            'prenomRes' => $data['prenomRes'],
            'nomRes' => $data['nomRes'],
            'logo' => $data['logo'],
            'abreviation' => $data['abrevation'],
            'pays' => $data['pays'],
            'ville' => $data['ville'],
            'adress' => $data['adress'],
            'tel' => $data['tel'],
            'fix' => $data['fix'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }else{
        return Gropement::create([
            'logo' => $data['name'],
            'nomAssociation' => $data['nomAssociation'],
            'prenomRes' => $data['prenomRes'],
            'nomRes' => $data['nomRes'],
            'abrevation' => $data['abrevation'],
            'pays' => $data['pays'],
            'ville' => $data['ville'],
            'adresse' => $data['adresse'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    }
}
