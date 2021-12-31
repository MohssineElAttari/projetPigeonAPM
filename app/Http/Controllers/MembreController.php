<?php

namespace App\Http\Controllers;

use App\Exports\MembreExport;
use App\Models\Asso_member;
use App\Models\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use App\Imports\MembreImport;
use App\Models\AssociationGroup;
use App\Models\User;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::id());
        $id = DB::table('association_groups')
            ->join('users', 'association_groups.user_id', '=', 'users.id')
            ->select('association_groups.id')
            ->where('association_groups.user_id', Auth::id())
            ->first()->id;
        $membres = DB::table('membres')
            ->join('asso_members', 'asso_members.membre_id', '=', 'membres.id')
            ->select('membres.*')
            ->where('asso_members.association_groups_id', $id)
            ->get();
        // dd($membres);
        $associationGroup=DB::table('association_groups')->where('user_id', Auth::id())->first();
        return view('dashboard/pages/membres', ['associationGroup' => $associationGroup,'membres' => $membres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $membre = new Membre();
        $membre->prenom_francais = $request->all()['prenom_francais'];
        $membre->prenom_arabe = $request->all()['prenom_arabe'];
        $membre->nom_francais = $request->all()['nom_francais'];
        $membre->nom_arabe = $request->all()['nom_arabe'];
        $membre->longitude = $request->all()['longitude'];
        $membre->latitude = $request->all()['latitude'];
        $membre->email = $request->all()['email'];
        $membre->tel = $request->all()['tel'];
        $membre->save();
        // $user=Auth::id();
        $id=User::find(Auth::id())->associatioGroupe->id;
                Asso_member::create([
            'association_groups_id' => $id,
            'membre_id' => $membre->id,
            'date_inscription' => date('Y-m-d H:i'),
        ]);

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $membre = Membre::find($id);
        $membre->prenom_francais = $request->all()['prenom_francais'];
        $membre->prenom_arabe = $request->all()['prenom_arabe'];
        $membre->nom_francais = $request->all()['nom_francais'];
        $membre->nom_arabe = $request->all()['nom_arabe'];
        $membre->longitude = $request->all()['longitude'];
        $membre->latitude = $request->all()['latitude'];
        $membre->email = $request->all()['email'];
        $membre->tel = $request->all()['tel'];
        $membre->save();
        return back()->with('success', 'update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membre=Membre::find($id);
        $membre->delete();
        // return redirect('back');
        return back()->withInput();
    }

    public function fileImportExport()
    {
       return view('dashboard/pages/membres');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        // dd(Excel::import(new MembreImport, $request->file('file')->store('temp')));
        $data = Excel::import(new MembreImport, $request->file('file')->store('temp'));
        return view('dashboard/pages/import', ['members' => $data]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        // dd();
        return Excel::download(new MembreExport, 'membres-collection.xlsx');
        return back();
    } 

    function showdata()
    {
        $associationGroup=DB::table('association_groups')->where('user_id', Auth::id())->first();
       return view('dashboard/pages/import', ['associationGroup' => $associationGroup]);
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
