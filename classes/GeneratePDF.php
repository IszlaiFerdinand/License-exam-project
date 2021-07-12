<?php
namespace Classes;

use mikehaertl\pdftk\Pdf;

class GeneratePDF{
    
    public function generate($formdata){
        $filename = 'Cerere '. $formdata['cumparator'] .'.pdf';
        $pdf = new Pdf('C:\xampp\htdocs\Szakdolgozat projekt\FILES\cerere.pdf',
        [ 'command' => 'C:\Program Files (x86)\PDFtk Server\bin\pdftk.exe',
        'useExec' => true
        ]);
        $pdf -> fillForm($formdata)
       ->flatten()
       ->saveAs('C:\xampp\htdocs\Szakdolgozat projekt\Completed/'.$filename);

       
        return $filename;
    }

}