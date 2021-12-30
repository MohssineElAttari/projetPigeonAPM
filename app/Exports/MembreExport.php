<?php

namespace App\Exports;

use App\Models\Membre;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MembreExport implements FromCollection,WithHeadings
{
    public function headings(): array
    {
        return ["id", "nom_francais", "nom_arabe","prenom_francais","prenom_arabe","latitude","longitude","email","tel","created_at","updated_at"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Membre::all();
    }
}
