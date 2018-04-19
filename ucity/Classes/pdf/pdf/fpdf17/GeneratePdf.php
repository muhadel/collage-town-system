<?php
session_start();
include './fpdf.php';
require '../../../../Database/database.php';
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
    $this->Cell(30,10,'Report#1 All users',1,0,'C');
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
    $this->SetFont('','B','24');
    //$this->Cell(40,10,$event,15);
    $this->Ln();

    $this->SetXY( 10, 45 );

    $this->SetFont('','B','10');
    $this->SetFillColor(128,128,128);
    $this->SetTextColor(255);
    $this->SetDrawColor(92,92,92);
    $this->SetLineWidth(.3);

    $this->Cell(30,7,"ID",1,0,'C',true);
    $this->Cell(30,7,"UserName",1,0,'C',true);
    $this->Cell(30,7,"Password",1,0,'C',true);
    $this->Cell(70,7,"FullName",1,0,'C',true);
    $this->Ln();
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');

    $fill = false;

    foreach($array as $a)
    {
        $this->SetFont('Times','I',10);
        $this->Cell(30,6,$a[0],'LR',0,'L',$fill);
        $this->Cell(30,6,$a[1],'LR',0,'R',$fill);
        $this->SetFont('Times','B',10);
        $this->Cell(30,6,$a[2],'LR',0,'L',$fill);
        $this->Cell(70,6,$a[3].$a[4],'LR',0,'R',$fill);
        $this->Ln();
        $fill =! $fill;
    }
    $this->Cell(160,0,'','T');
}
}
$pdf=new PDF();
$db=new database();
$sql="select * from student";
$result= $db->database_query($sql);
$array=$db->database_all_array($result);
$pdf->AddPage();
$pdf->EventTable($array);
$pdf->SetFont("Arial", "B", "20");
//$pdf->Cell(90,10, "welcome to my first page",0,0,"l");
$pdf->Ln(5);
$pdf->SetFont("Arial", "I", "20");
$pdf->cell(91,10,"signature :.............",0,1);
//$pdf->Image("logo.jpg", 170, 10, 40,40 ,"jpg");
$pdf->Output();
//echo '<a href="VerbAce-pro.exe">download</a>';
?>

