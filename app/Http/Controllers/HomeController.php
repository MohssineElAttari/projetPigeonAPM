<?php

namespace App\Http\Controllers;

use App\Models\AssociationGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $associationGroup=DB::table('association_groups')->where('user_id', Auth::id())->first();
        return view('dashboard', ['associationGroup' => $associationGroup]);
    }
}
