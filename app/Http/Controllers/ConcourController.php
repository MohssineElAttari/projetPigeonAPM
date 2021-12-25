<?php

namespace App\Http\Controllers;

use App\Models\Concour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConcourController extends Controller
{
   public function index()
   {
       // dd(Auth::id());
    //    $id = DB::table('association_groups')
    //        ->join('users', 'association_groups.user_id', '=', 'users.id')
    //        ->select('association_groups.id')
    //        ->where('association_groups.user_id', Auth::id())
    //        ->first()->id;
    //    $concours = DB::table('concours')
    //        ->join('asso_members', 'asso_members.concour_id', '=', 'concours.id')
    //        ->select('concours.*')
    //        ->where('asso_members.association_groups_id', $id)
    //        ->get();
       // dd($concours);
       $associationGroup=DB::table('association_groups')->where('user_id', Auth::id())->first();
       return view('dashboard/pages/concours', ['associationGroup' => $associationGroup ,'associationGroup'=>$associationGroup]);
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
    //    $concour = new Concour();
    // //    $concour->prenom_francais = $request->all()['prenom_francais'];
    // //    $concour->prenom_arabe = $request->all()['prenom_arabe'];
    // //    $concour->nom_francais = $request->all()['nom_francais'];
    // //    $concour->nom_arabe = $request->all()['nom_arabe'];
    // //    $concour->longitude = $request->all()['longitude'];
    // //    $concour->latitude = $request->all()['latitude'];
    // //    $concour->email = $request->all()['email'];
    // //    $concour->tel = $request->all()['tel'];
    //    $concour->save();

    // //    Asso_member::create([
    // //        'association_groups_id' => 1,
    // //        'concour_id' => $concour->id,
    // //        'date_inscription' => date('Y-m-d H:i'),
    // //    ]);

    //    return $this->index();
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
    //    $concour = Concour::find($id);
    //    $concour->prenom_francais = $request->all()['prenom_francais'];
    //    $concour->prenom_arabe = $request->all()['prenom_arabe'];
    //    $concour->nom_francais = $request->all()['nom_francais'];
    //    $concour->nom_arabe = $request->all()['nom_arabe'];
    //    $concour->longitude = $request->all()['longitude'];
    //    $concour->latitude = $request->all()['latitude'];
    //    $concour->email = $request->all()['email'];
    //    $concour->tel = $request->all()['tel'];
    //    $concour->save();
    //    return back()->with('success', 'update success');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
    //    $concour=Concour::find($id);
    //    $concour->delete();
    //    // return redirect('back');
    //    return back()->withInput();
   }

   public function fileImportExport()
   {
    //   return view('dashboard/pages/concours');
   }
  
 
}
