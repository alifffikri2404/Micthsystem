<?php

include('../../db_conn.php');
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

$idaset = $_REQUEST['id'];

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Data Pengurusan Aset');
$pdf->SetSubject('SDM');
$pdf->SetKeywords('SDM, Melaka, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
	require_once(dirname(__FILE__) . '/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
//$pdf->AddPage();

// add a page
$pdf->AddPage('L', 'A4');

$tarikh = date("d.m.Y");

$pdf->Write(0, 'Details Record', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);


// define some HTML content with style
$html = <<<EOF
<br/>

  <div id="chartContainer" style="height: 300px; width: 50%;">
  </div>


EOF;
//require 'barchart.php';
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// --------------------------------------------------- table view records ------

/*
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
	<tr>
	   <td>Tarikh : $tarikh_daftar</td>
	</tr>
	<tr>
		<td>No. Siri/ Plat : $no_siri</td>
	</tr>

</table>
EOD;
*/

$sqlA_query = "SELECT * 
FROM outstation where id =$idaset";
$result_set = mysqli_query($conn, $sqlA_query);
$row3 = mysqli_fetch_array($result_set);

$location = $row3['location'];
$purpose = $row3['purpose'];
$timeOut = $row3['timeOut'];
$dateOut = $row3['dateOut'];
$dateIn = $row3['dateIn'];
$timeIn = $row3['timeIn'];
$timeCu = $row3['timeCu'];
$emp_no = $row3['emp_no'];
$timeCuIn = $row3['timeCuIn'];


$name = $row3['name'];
include('../../../db_conn.php');

$sqlA_query = "SELECT * 
FROM empmaininfo  where Internal_Id =$emp_no";
$result_set = mysqli_query($conn, $sqlA_query);
$fetched_row = mysqli_fetch_array($result_set);



$fullname = $fetched_row['First_Name'] . ' ' . $fetched_row['Last_Name'];
$employeeid = $fetched_row['Internal_Id'];
$Department = $fetched_row['Department'];

$sql21 = "SELECT * FROM empdept WHERE dept_id   = '$Department'";


$result19 = mysqli_query($conn, $sql21);


$fetched_row1 = mysqli_fetch_assoc($result19);
$jabatan1=$fetched_row1['name'];
$tbl = <<<EOD

EOD;


$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -------- view XHTML ---------------------------------------------------------
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$debitOutput = ''; // Initialize $debitOutput

$debitOutput .= '
    <tr>
        <td align="left"><strong>Employee Name</strong> : ' . $fullname . '</td>            
    
        <td align="left"><strong>Employee Number</strong> : ' . $employeeid . '</td>
        <td align="left"><strong>Department</strong> : ' . $jabatan1 . '</td>                 
    </tr>
';



$debitOutput2 = ''; // Initialize $debitOutput2 before appending to it
$debitOutput2 .= '
   
    <tr>
        <td align="left"><strong>Location</strong> : ' . $location . '</td>
        <td align="left"><strong>Purpose</strong> : ' . $purpose . '</td>            
    </tr>
    <tr>
        <td align="left"><strong>Date-Out</strong> : ' . $dateOut . '</td>
        <td align="left"><strong>Time-Out</strong> : ' . $timeOut . '</td>     
        <td align="left"><strong>Time recorded-Out</strong> : ' . $timeCu . '</td>             
    </tr>
    <tr>
        <td align="left"><strong>Date-In</strong> : ' . $dateIn . '</td>
        <td align="left"><strong>Time-In</strong> : ' . $timeIn . '</td> 
        <td align="left"><strong>Time recorded-In</strong> : ' . $timeCuIn . '</td>                   
    </tr>
    
    
   ';




$debitOutput4 = '
		<br/><br/><br/>
        <br/><br/><br/>
        <br/><br/><br/>
        <br/><br/><br/>
        <br/><br/><br/>
        <br/><br/><br/>
        <br/><br/><br/>
        <br/><br/><br/>
      
      
      
     
    
        

		<table>
			<tr>
				<td>Provided by :</td>
				<td></td>
				<td>Reviewed by:</td>
				<td></td>
				<td>Verified by:</td>
			</tr>
			<br/><br/>
			<tr>
				<td>......................................</td>
				<td></td>
				<td>......................................</td>
				<td></td>
				<td>......................................</td>
			</tr>
			<tr>
				<td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
				<td></td>
				<td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
				<td></td>
				<td>(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
			</tr>
		</table>
		';


//}


$tbl = '
		<table cellspacing="1" cellpadding="2" border="0" width="100%">
					
				' . $debitOutput . '
                ' . $debitOutput2 . '	
				' . $debitOutput3 . '
				' . $debitOutput4 . '
		</table>
		';



		ob_clean();

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
