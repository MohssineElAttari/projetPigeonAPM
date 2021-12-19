<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembreController extends Controller
{
   public function index(){
       return view('dashboard/pages/membres');
   }
}
