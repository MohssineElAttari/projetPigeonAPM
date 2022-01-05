<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('dashboard/pages/importPigeon');
    }
    public function store(Request $request)
    {

        $file = $request->file;

        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
        //tester si le nom du membre qui existe dans ce fichier est déja inscris dans l'association : si oui alors vrai
        //tester si l'id du membre est déja existe dans la table concours pigeons

        // use of pdf parser to read content from pdf 
        $fileName = $file->getClientOriginalName();

        $pdfParser = new Parser();
        $pdf = $pdfParser->parseFile($file->path());
        $content = $pdf->getText();

        $upload_file = new File();
        $upload_file->orig_filename = $fileName;
        $upload_file->mime_type = $file->getMimeType();
        $upload_file->filesize = $file->getSize();
        $upload_file->content = $content;
        $upload_file->save();
        if (strpos($content, 'TIPES') !== false) {
            $type_camera = 'This is Tipes file';
        } else if (strpos($content, 'BENZING') !== false) {
            $type_camera = 'This is BENZING file';
            // foreach(preg_split("/((\r?\n)|(\r\n?))/", $content) as $line){
            //     // $test = $line;
            //     if(str_starts_with($line,'Amateur No.')){

            //          $test = substr($line, strpos($line, ":") + 1);
            //          $test = substr($test, strpos($test, ":") + 1);
            //     }
            // }
            $test_array = [];
            foreach (preg_split("/((\r?\n)|(\r\n?))/", $content) as $line) {
                // $test = $line;
                if (str_starts_with($line, 'Amateur No.')) {

                    $nom = substr($line, strpos($line, ":") + 1);
                    $nom = substr($nom, strpos($nom, ":") + 1);
                }
                if (str_starts_with($line, '00')) {

                    array_push($test_array, $line);
                    $i = 0;
                    $newarray = [];
                    foreach ($test_array as $test) {
                        $new_row = explode("|", $test);
                        foreach ($new_row as $row) {
                            // $newarray[$i] = $row;
                            //array_push ( $newarray, $row );
                            $newarray[$i][] = $row;
                        }
                        $i++;
                        // break;
                    }
                }
            }
            echo $nom;

            // newarray c'est les piegons
            print_r($newarray);
            //$test select nom from membre where('nom',$nom)
            // if($test)

            // foreach($newarray as $itm){
            //     $row = new concours_piegons();
            //     //idconcours
            //     //id_membre
            //     //id_
            // }
            $errur = [];
            //if membre is not exist : arraypush $errur
            //L'id du membre ne doit pas se répéter dans table concours pigeons
        }
        //  return redirect()->back()->with('success', $test);
    }
}
