<?php

namespace App\Exports;

use App\Models\AssociationGroup;
use App\Models\Membre;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MembreExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return ["id", "nom francais", "nom arabe", "prenom francais", "prenom arabe", "latitude", "longitude", "email", "tel", "date cration", "date modification","nom association"];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $associatioGroupe = User::find(Auth::id())->associatioGroupe;
        // $membres = AssociationGroup::find($associatioGroupe->id)->membres;

        $members = DB::table('membres')
            ->join('asso_members', 'membres.id', '=', 'asso_members.membre_id')
            ->join('association_groups', 'association_groups.id', '=', 'asso_members.association_groups_id')->where('association_groups.id', $associatioGroupe->id)
            ->select('membres.*', 'association_groups.nom_asso')
            ->get();
        // dd($members);
        return $members;
    }
}
