<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Association;
use App\Models\AssociationGroup;
use App\Models\Gropement;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
                'logo' => ['required', 'image' ],
                'nom_asso' => ['required', 'string', 'max:255'],
                'type' => ['required', 'string', 'max:255'],
                'prenom_res' => ['required', 'string', 'max:255'],
                'nom_res' => ['required', 'string', 'max:255'],
                'abreviation' => ['required', 'string', 'max:255'],
                'tel' => ['required', 'string', 'max:255'],
                'fix' => ['required', 'string', 'max:255'],
                'adresse' => ['required', 'string', 'max:255'],
                'pays' => ['required', 'string', 'max:255'],
                'ville' => ['required', 'string', 'max:255'],
                'page' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected function create(array $data)
    {
        // dd($data);
        $image_name = time() . '.' . $data['logo']->extension();
        // $data['logo'] = $image_name;
        $data['logo']->move(public_path('images/logo'), $image_name);
        
        return AssociationGroup::create([
            'logo' => $image_name,
            'nom_asso' => $data['nom_asso'],
            'type'=> $data['type'],
            'prenom_res' => $data['prenom_res'],
            'nom_res' => $data['nom_res'],
            'abreviation' => $data['abreviation'],
            'tel' => $data['tel'],
            'fix' => $data['fix'],
            'adresse' => $data['adresse'],
            'pays' => $data['pays'],
            'ville' => $data['ville'],
            'page' => $data['page'],
            'active'=> 0,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
}
