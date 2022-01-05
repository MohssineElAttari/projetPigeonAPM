<?php

namespace App\Http\Controllers;

use App\Models\AssociationGroup;
use App\Models\Concour;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConcourController extends Controller
{
    public function index()
    {

        $asso = User::find(Auth::id())->associatioGroupe;
        $concours = Concour::where('association_group_id', $asso->id)->get()->all();
        return view('dashboard/pages/concours', ['associationGroup' => $asso, 'concours' => $concours]);
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
        $concour = new Concour();
        $concour->designation = $request->all()['designation'];
        $concour->type = $request->all()['type'];
        $concour->etap = $request->all()['etap'];
        $concour->pourcentage = $request->all()['pourcentage'];
        $concour->heure = $request->all()['heure'];
        $concour->date = $request->all()['date'];
        $concour->latitude = $request->all()['latitude'];
        $concour->longitude = $request->all()['longitude'];
        $concour->association_group_id = User::find(Auth::id())->associatioGroupe->id;
        $concour->save();
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
        $concour = Concour::find($id);
        $concour->designation = $request->all()['designation'];
        $concour->type = $request->all()['type'];
        $concour->etap = $request->all()['etap'];
        $concour->pourcentage = $request->all()['pourcentage'];
        $concour->heure = $request->all()['heure'];
        $concour->date = $request->all()['date'];
        $concour->latitude = $request->all()['latitude'];
        $concour->longitude = $request->all()['longitude'];
        $concour->save();
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
        $concour = Concour::find($id);
        $concour->delete();
        return back()->withInput();
    }

    public function fileImportExport()
    {
        //   return view('dashboard/pages/concours');
    }
}
