<?php

namespace App\Imports;

use App\Models\Membre;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MembreImport implements ToCollection,WithHeadingRow,SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $rows)
    {
        // dd($rows);
        foreach ($rows as $row) {
            Membre::create([
                'prenom_francais'     => $row['prenom_francais'],
                'prenom_arabe'     => $row['prenom_arabe'],
                'nom_francais'    => $row['nom_francais'],
                'nom_arabe'    => $row['nom_arabe'],
                'longitude'    => $row['longitude'],
                'latitude'    => $row['latitude'],
                'email'    => $row['email'],
                'tel'    => $row['tel'],
            ]);
        }
    }
}
