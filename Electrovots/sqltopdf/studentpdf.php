<?php
require('mysql_table.php');
class PDF extends PDF_MySQL_Table
{
function Header()
{
	$year=$_GET['year'];
	 // Logo
    $this->Image('logo.png',35,2,30);
	$this->Image('logo2.png',145,2,30);
		//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'HCPSMSHS Voters List',0,1,'C');
	$this->Cell(0,10,"School Year $year",0,1,'C');
	$this->Ln(20);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
mysql_connect('localhost','root','');
mysql_select_db('dbelection');


$pdf=new PDF();
$pdf->AddPage();
//First table: put all columns automatically
$pdf->Table('SELECT CONCAT(LastName,", ",FirstName," ",MidInitial) Name ,`Password` from tblvoter where GradeYear IN (7,8,9) order by 1');
$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('Name',40,'Name','C');
$pdf->AddCol('Password',40,'Password','C');

$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);

//$pdf->Output("C:\Users\John\Desktop/somename.pdf",'F'); 
$location= '../PDF/StudentList/';
$filename ='StudentList';
$date = date('m-d-Y'); 
$pdf->Output($location.$filename.time().$date.".pdf"); 
header('Location:../PDF/StudentList/'.$filename.time().$date.".pdf");
?>
