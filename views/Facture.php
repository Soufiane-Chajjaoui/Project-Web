<?php
        require_once('../Tools/fpdf17/fpdf.php');
        require_once('../controllers/Order.php') ;
        require('../Tools/fpdf17/makefont/makefont.php');

        $info = Order::Invoice($_GET['id_command']) ;    
             $name = $_GET['id_command'] ;
         
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

// //Cell(width , height , text , border , end line , [align] )
// $pdf->Image('../images/projet.png',10,6,20);

// $pdf->Cell(130	,5,'Name societe',0,0);
// $pdf->Cell(80) ;
// $pdf->Cell(30,10,'Titre',1,0,'C');

// $pdf->Cell(59	,5,'INVOICE',0,2);//end of line
// //Cell(width , height , text , border , end line , [align] )

$pdf->Image('../images/pele.jpg',20,10,40,30 , null , 'http://localhost/projet_bakkas');
// Police Arial gras 15
$pdf->SetFont('helvetica','BIU',22);
// Décalage à droite
$pdf->Cell(80);
// Titre 
 
$pdf->Write(30,'Facture');

// Saut de ligne
$pdf->Ln(60);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'Rue 19 okba bnou nafia safi 42',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line

$pdf->Cell(130	,5,'Safi, Morocco, 46050 ',0,0);
$pdf->Cell(25	,5,'Date',0,0);
   $date = new DateTime($info['date']) ;
$pdf->Cell(34	,5,$date->format("Y/m/d H:i"),0,1);//end of line

$pdf->Cell(130	,5,'Phone [+212 6 07 02 53 29]',0,0);
$pdf->Cell(25	,5,'N Facture',0,0);
$pdf->Cell(34	,5, $info['ref_command'] ,0,1);//end of line

$pdf->Cell(130	,5,'Fax [+212 6 07 02 53 29]',0,0);
$pdf->Cell(25	,5,'Client ID',0,0);
$pdf->Cell(34	,5, $info['id'] ,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
// Saut de ligne
$pdf->Ln(20);
//billing address
$pdf->Cell(100	,5,'Proprietaire to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5, ucfirst($info['nom']) .' '. $info['prenom'] ,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5, $info['adress'] ,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5, $info['email'] ,0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5, $info['numero_tele'] ,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line
// Saut de ligne
$pdf->Ln(20);
 //invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'    Description',1,0);
$pdf->Cell(25	,5,'    Taxable',1,0);
$pdf->Cell(34	,5,'    Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter
     $info = Order::infoProduct($_GET['id_command']) ;
      $total = 0 ;
      while($ligne = $info->fetchObject()){

        $pdf->Cell(130	,5,$ligne->libelle,1,0);
        $pdf->Cell(25	,5,'          -     ',1,0);
        $pdf->Cell(34	,5,$ligne->prix_vent,1,1,'R');//end of line

     $total +=  $ligne->prix_vent ;
      }


 
//summary
 
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,$total,1,1,'R');//end of line




















$pdf->Output('D', "Facture de command ".$name.".pdf");
?>
