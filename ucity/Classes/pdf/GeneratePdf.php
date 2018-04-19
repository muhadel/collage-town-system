<?php
session_start();
 $id = $_SESSION['id'];
include './fpdf.php';
require '../../Database/database.php';

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
    $this->Cell(91,10,'UCity',0,1,'L');
    //Line break
    $this->Ln(20);
}
//Page footer
function Footer()
{
    //Position at 1.5 cm from bottom
   $this->SetY(-15);
    //Arial italic 8
    $this->SetFont('Arial','I',8);
    //Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
function EventTable($array2)
{
    $this->SetFont('','B','14');
    //$this->Cell(40,10,$event,15);
    $this->Ln();

    $this->SetXY( 10, 35 );

    $this->SetFont('','B','10');
    $this->SetFillColor(128,128,128);
    $this->SetTextColor(255);
    $this->SetDrawColor(92,92,92);
    $this->SetLineWidth(.4);
     //$this->Cell(10,7,"Name",1,0,'C',true);
    //$this->Cell(30,7,"Phone",1,0,'C',true);
    // $this->Cell(30,7,"ID",1,0,'C',true);
       //$this->Cell(20,7,"Collage",1,0,'C',true);
      //$this->Cell(30,7,"Status",1,0,'C',true);
          //$this->Cell(40,7,"time",1,0,'C',true);
      //$this->Cell(20,7,"num_of_day",1,0,'C',true);
    
      $this->Ln();
      $this->SetFillColor(224,235,255);
     $this->SetTextColor(0);
     $this->SetFont('');

    $fill = false;

    for($i=0;$i<$array2["Row"];$i++)
    {
        
     
       // $this->SetFont('Times','I',10);
        //$this->Cell(10,18,$array2["P_Email".$i],'LR',0,'L',$fill);
        //$this->Cell(10,8,$array2["P_Phone".$i],'LR',0,'L',$fill);
        //$this->Cell(10,18,$array2["T_ID".$i],'LR',0,'L',$fill);
        //$this->Cell(20,16, $array2["T_name".$i],'LR',0,'R',$fill);
        //$this->Cell(30,16,$array2["T_price".$i],'LR',0,'R',$fill);
        //$this->SetFont('Times','B',10);
        //$this->Cell(30,6,$array2["T_Trainer".$i],'LR',0,'L',$fill);
       // $this->Cell(40,6, $array2["T_time".$i],'LR',0,'R',$fill);
       // $this->Cell(20,6,$array["num_of_day".$i],'LR',0,'L',$fill);
        
        $this->Ln();
        $fill =! $fill;
    }
    $this->Cell(160,0,'','T');
}
}
$pdf=new PDF();
$db=new database();

//$sql="select * from users";
$data = $db->get_row("SELECT collage,national_id,city,address,parent_phone FROM `student`WHERE users_id=\"$id\"");
$_SESSION['collage'] =$data['collage'];
$_SESSION['national_id'] =$data['national_id'];
$_SESSION['city'] =$data['city'];
$_SESSION['address'] =$data['address'];
$_SESSION['parent_phone'] =$data['parent_phone'];

$data = $db->get_row("SELECT building_num FROM `room` INNER JOIN `student` on student.room_id = room.id WHERE student.users_id=\"$id\"");
$_SESSION['building_num'] =$data['building_num'];

$building_num = $_SESSION['building_num'];

$name = $_SESSION['name'];
$name = ucwords($name);

$national_id = $_SESSION['national_id'];
$collage = $_SESSION['collage'];

if(isset($building_num))
{
    
}

$pdf->AddPage();
$pdf->EventTable($array2);
$pdf->SetFont("Arial", "B", "20");
//$pdf->Cell(90,10, "welcome to my first page",0,0,"l");
$pdf->Ln(5);
$pdf->SetFont("Arial", "I", "20");

$pdf->cell(50,30,"Name: $name",0,1);
$pdf->cell(50,30,"National id : $national_id",0,1);
$pdf->cell(91,30,"Collage: $collage",0,1);

if(isset($building_num))
{
    $pdf->cell(91,30,"You have been accepted in building Number: $building_num",0,1);
    $pdf->cell(91,30,"Status: ACCEPTED",0,1);
} else {
    $pdf->cell(91,30,"Status: REFUSED",0,1);
}


//$pdf->Image("logo.jpg", 170, 10, 40,40 ,"jpg");
$pdf->Output();
//echo '<a href="VerbAce-pro.exe">download</a>';
?>

