<?php

namespace App\Http\Controllers;

use App\Imports\MembreImport;
use App\Models\Asso_member;
use App\Models\Membre;
use App\Models\User;
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
        // dd($request);
        // dd($request->file('file'));
        if (!$request->file('file')) {
            return back()->withErrors(['msg' => 'Faire une importation d\'un fichier']);
        }else {
            $associationGroup = DB::table('association_groups')->where('user_id', Auth::id())->first();
            $this->members = Excel::toCollection(collect([]), $request->file('file'));
            // return redirect()->route('membre-mmport', ['associationGroup' => $associationGroup,'members' => $this->members]);
            // Get the csv rows as an array
            // $this->members = Excel::toArray(new stdClass(), $request->file('file'));
            // return back()->with('success', 'update success');
            return view('dashboard/pages/import', ['associationGroup' => $associationGroup, 'members' => $this->members])->with('message', 'import success');
        }
    }
    function analise_data(Request $request)
    {
        if ($request->ajax()) {
            $data = array('members' => $request->result);
            // $response = json_encode($data);
            $values = $data['members'];
            // dd($values);
            // echo json_encode($response);
            foreach ($values as $key => $value) {
                $members = DB::table('membres')->where([
                    ['nom_francais', $value['nom francais']],
                    ['prenom_francais', $value['prenom francais']],
                ]);
                if (!$members->exists()) {
                    $values[$key]['exist'] = 0;
                } else {
                    $values[$key]['exist'] = 1;
                }
            }
            echo json_encode($values);
        }
    }

    function insert_data(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->result;
            foreach ($data as $key => $value) {
                $membre = new Membre();

                $membre->nom_francais = $value['nom francais'];
                $membre->nom_arabe = $value['nom arabe'];
                $membre->prenom_francais = $value['prenom francais'];
                $membre->prenom_arabe = $value['prenom arabe'];
                $membre->latitude = $value['latitude'];
                $membre->longitude = $value['longitude'];
                $membre->email = $value['email'];
                $membre->tel = $value['tel'];
                $membre->save();
                // $asso_membre=new Asso_member();
                $id = User::find(Auth::id())->associatioGroupe->id;
                Asso_member::create([
                    'association_groups_id' => $id,
                    'membre_id' => $membre->id,
                    'date_inscription' => date('Y-m-d H:i'),
                ]);
            }
            echo '<div class="alert-message alert alert-success p-1">insert data</div>';
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
