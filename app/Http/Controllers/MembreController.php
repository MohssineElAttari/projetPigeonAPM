<?php

namespace App\Http\Controllers;

use App\Models\Asso_member;
use App\Models\Membre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

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

        return view('dashboard/pages/membres', ['membres' => $membres]);
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

        Asso_member::create([
            'association_groups_id' => 1,
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
        //
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
}
