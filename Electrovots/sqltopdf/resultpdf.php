<?php
require('mysql_table.php');
include('../include/getYear.php');
$year=$_GET['year'];

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
			$this->Cell(0,6,'HCPSMSHS Election Result',0,1,'C');
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
//SELECT CONCAT(LastName," ",MidInitial," ",FirstName) Name ,`Password` from tblvoter order by 1

$pdf->Table('SELECT CONCAT(c.FirstName," ",c.MidInitial," ", c.LastName ) name ,
								(SELECT PositionName FROM tblposition p WHERE c.PositionID=p.PID) Position, 
								(SELECT PLNameAb FROM tblpartylist pl WHERE c.PartyListID=pl.PLID) PartyList,  
								COUNT(c.FirstName) votes	
							    FROM tblcandidate c
							    INNER JOIN tblvotes r ON c.CID = r.CandidateID
								AND r.SY=(SELECT SY FROM tblyearselected)
							    GROUP BY c.FirstName
							    ORDER BY c.PositionID ASC, COUNT(c.FirstName) DESC');
$pdf->AddPage();
//Second table: specify 3 columns
$pdf->AddCol('name',40,'C');
$pdf->AddCol('b1',40,'C');
$pdf->AddCol('b2',40,'C');
$pdf->AddCol('result',40,'C');

$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,210),
			'padding'=>2);


//$pdf->Output("C:\Users\John\Desktop/somename.pdf",'F'); 
$location= '../PDF/ElectionResult/';
$filename ='ElectionResult';
$date = date('m-d-Y'); 
$pdf->Output($location.$filename.time().$date.".pdf"); 
header('Location:../PDF/ElectionResult/'.$filename.time().$date.".pdf");
?>
