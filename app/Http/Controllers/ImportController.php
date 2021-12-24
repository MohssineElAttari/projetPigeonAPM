<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    function index()
    {
        return view('dashboard/pages/import');
    }

    function fetch_data(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('membres')->orderBy('id', 'desc')->get();
            echo json_encode($data);
        }
    }

    function add_data(Request $request)
    {
        if ($request->ajax()) {
            $data = array(
                'prenom_francais'    =>  $request->prenom_francais,
                'nom_francais'     =>  $request->nom_francais,
                'longitude'     =>  $request->longitude,
                'latitude'     =>  $request->latitude,
                'email'     =>  $request->email,
                'tel'     =>  $request->tel,
            );
            $id = DB::table('membres')->insert($data);
            if ($id > 0) {
                echo '<div class="alert alert-success">Data Inserted</div>';
            }
        }
    }

    function update_data(Request $request)
    {
        if ($request->ajax()) {
            $data = array(
                $request->column_name =>  $request->column_value
            );
            DB::table('membres')
                ->where('id', $request->id)
                ->update($data);
            echo '<div class="alert alert-success">Data Updated</div>';
        }
    }

    function delete_data(Request $request)
    {
        if ($request->ajax()) {
            DB::table('membres')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert alert-success">Data Deleted</div>';
        }
    }
}
