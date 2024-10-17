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
 $tarikh_daftar = $_REQUEST['tarikh_daftar'];
 $kategori_aset = $_REQUEST['kategori_aset'];
 $jenis_aset = $_REQUEST['jenis_aset'];
 $no_siri = $_REQUEST['no_siri'];
 $nama_aset = $_REQUEST['nama_aset'];
 $tahun_beli = $_REQUEST['tahun_beli'];
 $harga_beli = $_REQUEST['harga_beli'];
 $warna = $_REQUEST['warna'];
 // $lokasi = $_REQUEST['lokasi_jabatan'];
 // $cukai_jalan = $_REQUEST['cukai_jalan'];

//  include('../../config.php') ;
 
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

$pdf->Write(0, 'Rekod Aset', '', 0, 'L', true, 0, false, false, 0);

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

$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0" style="font-size:15px;">

<tr>
       <td>Tarikh laporan dicetak: $tarikh</td>
    </tr>

    <tr>
       <td>Rekod Pengurusan Keseluruhan Aset</td>
    </tr>
</table>
EOD;


$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -------- view XHTML ---------------------------------------------------------
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


$sqlvtp = "SELECT * FROM tbl_daftar_aset 
INNER JOIN kategoritps
ON tbl_daftar_aset.kategori_aset = kategoritps.id_kategori";

$result = mysqli_query($conn2, $sqlvtp); // Replace $your_db_connection with your actual database connection variable

$debitOutput = "";
$i = $offset + 1;

while ($row = mysqli_fetch_array($result)) {
$debitOutput .= '
<tr>
	<td align="center">'.$i.'</td>
	<td align="center" style="letter-spacing: initial;">&nbsp;&nbsp;&nbsp;'.$row['nama_kategori'].'</td>
	<td align="left">&nbsp;&nbsp;&nbsp;'.$row['jenis_aset'].'</td>
	<td align="left">'.$row['no_siri'].'</td>
	<td align="left">'.$row['no_aset'].'</td>
	<td align="left" style="text-transform: capitalize;">'.$row['nama_aset'].'</td>
	<td align="center">'.$row['lokasi'].'</td>
	
</tr>';	
	// <td align="center">'.$row['cukai_jalan'].'</td>
$i++;
}

		
		$debitOutput4 = '
		<br/><br/><br/>
		<table>
			<tr>
				<td>Disediakan Oleh:</td>
				<td></td>
				<td>Disemak Oleh:</td>
				<td></td>
				<td>Disahkan Oleh:</td>
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
				<td align="center" width="4%"><strong>Bil.</strong></td>
				<td align="left" width="15%"><strong>Kategori</strong></td>
				<td align="left" width="15%"><strong>Jenis Aset</strong></td>
				<td align="left" width="15%"><strong>No. Siri /<br> Plat</strong></td>
				<td align="center" width="15%"><strong>No Aset</strong></td>
				<td align="center" width="20%"><strong>Nama Aset</strong></td>
				<td align="center" width="9%"><strong>Lokasi Penempatan</strong></td>
			</tr>			
				'.$debitOutput.'
                '.$debitOutput2.'	
				'.$debitOutput3.'
				'.$debitOutput4.'
		</table>
		';
		// <td align="center" width="9%"><strong>Cukai <br> Jalan Tamat</strong></td>					




$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
