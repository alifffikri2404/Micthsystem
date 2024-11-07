<?php
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

include('../../configAsetTPS.php') ;
$idaset = $_REQUEST['barcode'];
print_r($idaset);
 /*$tarikh_daftar = $_REQUEST['tarikh_daftar'];
 $kategori_aset = $_REQUEST['kategori_aset'];
 $jenis_aset = $_REQUEST['jenis_aset'];
 $no_siri = $_REQUEST['no_siri'];
 $nama_aset = $_REQUEST['nama_aset'];
 $tahun_beli = $_REQUEST['tahun_beli'];
 $harga_beli = $_REQUEST['harga_beli'];
 $warna = $_REQUEST['warna'];
 $lokasi = $_REQUEST['lokasi'];
 $cukai_jalan = $_REQUEST['cukai_jalan']; */
 require('../../../db_conn.php');

// $eno_siri=$_REQUEST["no_siri"];

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// $sqlvtp = "SELECT * FROM history_aset WHERE no_aset = $eno_siri";
include('../../configAsetTPS.php');


$sqlvtp = "SELECT * 
FROM tbl_daftar_aset
INNER JOIN asset_management_vba
ON tbl_daftar_aset.no_aset = asset_management_vba.`Full ID (Concatenated ID)` 
WHERE tbl_daftar_aset.no_aset = ?";

$stmt = $conn2->prepare($sqlvtp);

$stmt->bind_param('s', $idaset);

$stmt->execute();

$result12 = $stmt->get_result();

$rowAAA = $result12->fetch_array(MYSQLI_ASSOC);

if ($rowAAA) {
  
} else {
    echo "No record found with no_aset = $idaset";
}

// Close the statement and the connection
$stmt->close();
$conn2->close();
$lokasi_jabatan = $rowAAA['lokasi_jabatan'];

		$sqlAB2 = "SELECT * FROM empdept WHERE dept_id = $lokasi_jabatan";
		require('../../../db_conn.php');

		$resultAB2 = mysqli_query($conn, $sqlAB2);

		if($resultAB2){
			$rowAB2 = mysqli_fetch_assoc($resultAB2);
			if($rowAB2){
				$lokasi_jabatan2 = $rowAB2['name'];
			} else{
				$lokasi_jabatan2 = "None"; 
			}
		} else{
			$lokasi_jabatan2 = "None";
		}
// $countAP = mysqli_num_rows($result1);

// $row = mysqli_fetch_assoc($result1);
// // $lokasi_id = isset($row['lokasi']) ? $row['lokasi'] : '';
// $lokasi_id = $row['lokasi_jabatan'];

// $lokasi_jabatan2 = '';
// if (!empty($lokasi_id) && $lokasi_id != '-') {
//     $sqlAP2 = "SELECT * FROM empdept WHERE dept_id = $lokasi_id";
//     $resultAP2 = mysqli_query($conn2, $sqlAP2);

//     if ($resultAP2 && mysqli_num_rows($resultAP2) > 0) {
//         $location_row = mysqli_fetch_assoc($resultAP2);
//         $lokasi_jabatan2 = isset($location_row['name']) ? $location_row['name'] : 'None';
//     } else {
//         $lokasi_jabatan2 = 'None';
//     }
// } else {
//     $lokasi_jabatan2 = 'None';
// }


ob_start();

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Asset Log History');
$pdf->SetSubject('SDM');
$pdf->SetKeywords('SDM, Melaka, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

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
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
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

$pdf->Write(0, 'Asset Log Report', '', 0, 'L', true, 0, false, false, 0);

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
$namaaset = ucwords($rowAAA['nama_aset']);
$debitOutput = '';
$debitOutput2 = '';
$debitOutput3 = '';
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0" style="font-size:14px;">

	<tr>
		<td></td>
	</tr>
	<tr>
		<td>Print Date: $tarikh</td>
	</tr>

	<tr>
		<td>Asset Management Record Log</td>
	</tr>

	<tr>
		<td></td>
	</tr>
	<tr>
		<td>Asset Name: <strong>$namaaset</strong></td>
	</tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -------- view XHTML ---------------------------------------------------------
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
	

// $sqlvtp = "SELECT * FROM history_aset WHERE no_aset = $eno_siri";
// $result1 = mysqli_query($conn2, $sqlvtp);

// <tr>
// <td align="left" colspan="1" style="font-size:13;"><strong>Asset Name : </strong> '.ucwords(strtolower($row['nama_aset'])).'</td>
// </tr>';

$offset = 0; // Define and initialize $offset
$i = $offset + 1;

	
$debitOutput2 .= '
		<tr>
			<td align="center">' . $i . '</td>
			<td align="center">&nbsp;&nbsp;&nbsp;' . $rowAAA['tarikh_daftar'] . '</td>
			<td align="center">&nbsp;&nbsp;&nbsp;' . $rowAAA['tarikh_serahan'] . '</td>
			<td align="left">' . $rowAAA['no_aset'] . '</td>
			<td align="left">' . $rowAAA['nama_aset'] . '</td>
			<td align="left">' . $rowAAA['nama_kakitangan'] . '</td>
			<td align="left" style="text-transform: capitalize">' . $lokasi_jabatan2 . '</td>
		</tr>';
    $i++;

// Output or use $debitOutput as needed // $lokasi_jabatan2 // $row['lokasi']


	

		
		$debitOutput4 = '
		<br/><br/><br/>
		<table>
			<tr>
				<td>Prepared by:</td>
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
		<table cellspacing="1" cellpadding="2" border="1" width="100%">
			<tr style="background-color:#CEE3F6;color:#000000;">
				<td align="center" width="4%"><strong>No.</strong></td>
				<td align="center" width="9%"><strong>Registration Date</strong></td>
				<td align="center" width="9%"><strong>Handover Date</strong></td>
				<td align="center" width="14%"><strong>Asset Number</strong></td>
				<td align="center" width="20%"><strong>Asset Name</strong></td>	
				<td align="center" width="22%"><strong>Staff Name</strong></td>	
				<td align="center" width="22%"><strong>Dept. Location</strong></td>						
			</tr>			
				'.$debitOutput.'
				'.$debitOutput2.'	
				'.$debitOutput3.'
				'.$debitOutput4.'
		</table>
		';
		




$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
