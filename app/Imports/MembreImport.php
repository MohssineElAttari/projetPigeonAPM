<?php

namespace App\Imports;

use App\Models\Membre;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;


class MembreImport implements ToCollection,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     dd($row);
    //     return new Membre([
    //         'prenom_francais'     =>$row[0],
    //         'prenom_arabe'     =>$row[1],
    //         'nom_francais'    =>$row[2],
    //         'nom_arabe'    =>$row[3],
    //         'longitude'    =>$row[4],
    //         'latitude'    =>$row[5],
    //         'email'    =>$row[6],
    //         'tel'    =>$row[7],
    //     ]);
    // }

    // public function model(array $row)
    // {
    //     return new Membre([
    //         'prenom_francais'     => $row[0],
    //         'prenom_arabe'     => $row[1],
    //         'nom_francais'    => $row[2],
    //         'nom_arabe'    => $row[3],
    //         'longitude'    => $row[4],
    //         'latitude'    => $row[5],
    //         'email'    => $row[6],
    //         'tel'    => $row[7],
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        dd($rows);
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
