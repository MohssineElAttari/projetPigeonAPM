<?php

namespace App\Http\Controllers;

use App\Imports\MembreImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class IpmortMembreController extends Controller
{
    private $members = [];

    function showdata()
    {

        $associationGroup = DB::table('association_groups')->where('user_id', Auth::id())->first();
        return view('dashboard/pages/import', ['associationGroup' => $associationGroup, 'members' => $this->members]);
    }

    public function fileImport(Request $request)
    {
        // dd(Excel::import(new MembreImport, $request->file('file')->store('temp')));
        // $this->members = Excel::import(new MembreImport, $request->file('file')->store('temp'));

        // Get the csv rows as an array
        // $this->members = Excel::toArray(new stdClass(), $request->file('file'));

        // Get the csv rows as a collection
        $associationGroup = DB::table('association_groups')->where('user_id', Auth::id())->first();
        $this->members = Excel::toCollection(collect([]), $request->file('file'));
        // Get the csv rows as an array
        // $this->members = Excel::toArray(new stdClass(), $request->file('file'));
        // dd($data);
        // return back()->with('success', 'update success');
        // return redirect()->route('membre-mmport', ['associationGroup' => $associationGroup,'members' => $this->members]);
        return view('dashboard/pages/import', ['associationGroup' => $associationGroup, 'members' => $this->members]);
    }
    function analise_data(Request $request)
    {
        if ($request->ajax()) {
            $data = array('members' => $request->result);
            $response = json_encode($data);
            echo json_encode($response);
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
                echo '<div class="alert alert-message alert-success p-1">Data Inserted</div>';
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
            echo '<div class="alert-message alert alert-success p-1">Data Updated</div>';
        }
    }

    function delete_data(Request $request)
    {
        if ($request->ajax()) {
            DB::table('membres')
                ->where('id', $request->id)
                ->delete();
            echo '<div class="alert-message alert alert-success p-1">Data Deleted</div>';
        }
    }
}
