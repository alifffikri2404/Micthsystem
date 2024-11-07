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
$idaset = $_REQUEST['id'];
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
 include('../../config.php') ;

// $eno_siri=$_REQUEST["no_siri"];

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// $sqlvtp = "SELECT * FROM history_aset WHERE no_aset = $eno_siri";
$sqlvtp = "SELECT DISTINCT history_aset.*
			FROM history_aset
			INNER JOIN tbl_daftar_aset ON tbl_daftar_aset.no_aset = history_aset.no_aset
			WHERE tbl_daftar_aset.id = $idaset";
$result1 = mysqli_query($conn2, $sqlvtp);
// $countAP = mysqli_num_rows($result1);

$row = mysqli_fetch_assoc($result1);
// $lokasi_id = isset($row['lokasi']) ? $row['lokasi'] : '';
$lokasi_id = $row['lokasi'];

$lokasi_jabatan2 = '';
if (!empty($lokasi_id) && $lokasi_id != '-') {
    $sqlAP2 = "SELECT * FROM hrm_subunit WHERE id = $lokasi_id";
    $resultAP2 = mysqli_query($conn, $sqlAP2);

    if ($resultAP2 && mysqli_num_rows($resultAP2) > 0) {
        $location_row = mysqli_fetch_assoc($resultAP2);
        $lokasi_jabatan2 = isset($location_row['name']) ? $location_row['name'] : 'Tiada';
    } else {
        $lokasi_jabatan2 = 'Tiada';
    }
} else {
    $lokasi_jabatan2 = 'Tiada';
}

ob_start();

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Rekod Aset');
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

$pdf->Write(0, 'Log Rekod Aset', '', 0, 'L', true, 0, false, false, 0);

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
<table cellspacing="0" cellpadding="1" border="0" style="font-size:11px;">

<tr>
       <td>Tarikh Laporan Dicetak: $tarikh</td>
    </tr>

    <tr>
       <td>Log Rekod Pengurusan Aset</td>
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
$debitOutput = "";
$debitOutput2 = '';
$debitOutput3 = '';


$offset = 0; // Define and initialize $offset
$i = $offset + 1;

while ($row = mysqli_fetch_array($result1)) {
    $debitOutput .= '
        <tr>
            <td align="center">' . $i . '</td>
            <td align="center">&nbsp;&nbsp;&nbsp;' . $row['tarikh_daftar'] . '</td>
            <td align="left">&nbsp;&nbsp;&nbsp;' . $row['tarikh_serahan'] . '</td>
            <td align="left">' . $row['no_aset'] . '</td>
            <td align="left">' . $row['nama_aset'] . '</td>
            <td align="left" style="text-transform: capitalize">' . $lokasi_jabatan2 . '</td>
        </tr>';

    $i++;
}


// Output or use $debitOutput as needed // $lokasi_jabatan2 // $row['lokasi']


	

		
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
				<td align="center" width="10%"><strong>Tarikh Semasa</strong></td>
				<td align="center" width="10%"><strong>Tarikh Serahan</strong></td>
				<td align="center" width="15%"><strong>No. Aset</strong></td>
				<td align="center" width="20%"><strong>Nama Aset</strong></td>	
				<td align="center" width="25%"><strong>Lokasi</strong></td>						
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
