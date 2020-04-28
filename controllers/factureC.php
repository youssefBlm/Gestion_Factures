<?php

require "views/vendors/fpdf.php";

class myPDF extends FPDF
{}

class FactureController 
{
    public function construct()
    {
    }

    public function generatePDF()
    {
        
             $pdf=new myPDF();
             $pdf->AliasNbPages();
             $pdf->AddPage('L','A4',0);
             $pdf->Output();
        
    }




}