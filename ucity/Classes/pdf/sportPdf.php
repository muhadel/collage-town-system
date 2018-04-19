<?php
include './fpdf.php';
require './DbConnection.php';
include '../db_sport.php';
class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    $this->Image('logo1.png',10,8,33,20);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    //Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(30,10,'mohamed nasser elnams',1,0,'C');
    //Line break
    $this->Ln(20);
}
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
   // $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
function EventTable($array)
{
    $this->SetFont('','B','14');
    //$this->Cell(40,10,$event,15);
    $this->Ln();

    $this->SetXY( 10, 45 );

    $this->SetFont('','B','10');
    $this->SetFillColor(128,128,128);
    $this->SetTextColor(255);
    $this->SetDrawColor(92,92,92);
    $this->SetLineWidth(.4);
     $this->Cell(10,7,"ID",1,0,'C',true);
      $this->Cell(30,7,"price",1,0,'C',true);
      $this->Cell(30,7,"Trainer",1,0,'C',true);
      $this->Cell(40,7,"time",1,0,'C',true);
      $this->Cell(20,7,"num_of_day",1,0,'C',true);
      $this->Cell(20,7,"name",1,0,'C',true);
      $this->Ln();
      $this->SetFillColor(224,235,255);
     $this->SetTextColor(0);
     $this->SetFont('');

    $fill = false;

    for($i=0;$i<$array["Row"];$i++)
    {
        
     
        $this->SetFont('Times','I',10);
        $this->Cell(10,8,$array["ID".$i],'LR',0,'L',$fill);
        $this->Cell(30,6,$array["price".$i],'LR',0,'R',$fill);
        //$this->SetFont('Times','B',10);
        $this->Cell(30,6,$array["Trainer".$i],'LR',0,'L',$fill);
        $this->Cell(40,6, $array["time".$i],'LR',0,'R',$fill);
        $this->Cell(20,6,$array["num_of_day".$i],'LR',0,'L',$fill);
        $this->Cell(20,6, $array["name".$i],'LR',0,'R',$fill);
        $this->Ln();
        $fill =! $fill;
    }
    $this->Cell(160,0,'','T');
}
}
$pdf=new PDF();

$testObject = new DataBase_sport_Class();
$array2=array();
$array2=$testObject->info_sport();

$pdf->AddPage();
$pdf->EventTable($array2);
$pdf->SetFont("Arial", "B", "20");
//$pdf->Cell(90,10, "welcome to my first page",0,0,"l");
$pdf->Ln(5);
$pdf->SetFont("Arial", "I", "20");
$pdf->cell(91,10,"signature :.............",0,1);
//$pdf->Image("logo.jpg", 170, 10, 40,40 ,"jpg");
$pdf->Output();
//echo '<a href="VerbAce-pro.exe">download</a>';
?>

