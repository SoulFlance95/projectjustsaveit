<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use Codexshaper\WooCommerce\Facades\Order;

class makepdfController extends Controller
{
    //
    public function createpdf(Request $request){
        $name=$request->get('name');
        $outputfile=public_path().'etiquette.pdf';
        $this->fillPDF(public_path().'\master\etiquette.pdf', $outputfile,$name);
        
        return response()->file($outputfile);
    
            }

   
    

    public function fillPDF($file,$outputfile,$name){
  
        $fpdi= new FPDI();
        $fpdi->setSourceFile($file);
        $template=$fpdi->importPage(1);
        $size=$fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top=20;
        $right=135;
        $name=$name;
        $fpdi->SetFont("Helvetica","","17");
        $fpdi->SetTextColor(25,25,25);
        $fpdi->Text($top,$right,$name);
       
    

        return $fpdi->Output($outputfile,"F");
    
    }
    
   
  
}
