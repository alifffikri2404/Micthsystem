<?php
// $lokasi_id = $row['lokasi_jabatan'];
// if(!empty($lokasi_id) && ($lokasi_id != '-')){
// 	$sqlAP2 = "SELECT * FROM hrm_subunit WHERE id = $lokasi_id";
// 	$resultAP2 = mysqli_query($conn, $sqlAP2);

// 	if ($resultAP2) {
// 		$row = mysqli_fetch_assoc($resultAP2);
// 		$lokasi_jabatan2 = $row['name'];
// 	} else {
// 			$lokasi_jabatan2 = "Tiada";
// 	}
// 	} else {
// 		$lokasi_jabatan2 = "Tiada";
// 	}

?>
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

include('../../config.php') ;
require('../../../db_conn.php');

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

$sql = "SELECT * FROM tbl_daftar_aset
        LEFT JOIN tbl_pembekal ON tbl_daftar_aset.id_pembekal = tbl_pembekal.id_pembekal
        INNER JOIN kategoritps ON tbl_daftar_aset.kategori_aset = kategoritps.id_kategori
        WHERE tbl_daftar_aset.id = $idaset";

$row_set = mysqli_query($conn2, $sql);

if (!$row_set) {
    die("Error: " . mysqli_error($conn2));
}

$row = mysqli_fetch_array($row_set);

$kategori_id = isset($row['kategori_aset']) ? $row['kategori_aset'] : '';

$lokasi_id = isset($row['lokasi_jabatan']) ? $row['lokasi_jabatan'] : '';
$namaaset = isset($row['nama_aset']) ? $row['nama_aset'] : '';

$lokasi_jabatan2 = '';
if (!empty($lokasi_id) && $lokasi_id != '-') {
	$sqlAP2 = "SELECT * FROM empdept WHERE dept_id = $lokasi_id";
	$resultAP2 = mysqli_query($conn, $sqlAP2);

    if ($resultAP2 && mysqli_num_rows($resultAP2) > 0) {
        $location_row = mysqli_fetch_assoc($resultAP2);
        $lokasi_jabatan2 = isset($location_row['name']) ? $location_row['name'] : 'Tiada';
    } else {
        $lokasi_jabatan2 = 'None';
    }
} else {
    $lokasi_jabatan2 = 'None';
}

$nama_kakitangan = isset($row['nama_kakitangan']) ? $row['nama_kakitangan'] : '';
if (!empty($nama_kakitangan) && $nama_kakitangan != '-') {
	$nama_kakitangan2 = $nama_kakitangan;
} else{
	$nama_kakitangan2 = 'None';
}

$no_siri = isset($row['no_siri']) ? $row['no_siri'] : '';
if (!empty($no_siri) && $no_siri != '-') {
	$no_siri2 = $no_siri;
} else{
	$no_siri2 = 'None';
}

$warna = isset($row['warna']) ? $row['warna'] : '';
if (!empty($warna) && $warna != '-') {
	$warna2 = $warna;
} else{
	$warna2 = 'None';
}

$warranty = isset($row['warranty']) ? $row['warranty'] : '';
if (!empty($warranty) && $warranty != '-') {
	$warranty2 = $warranty;
} else{
	$warranty2 = 'None';
}

$nama_pembekal = isset($row['nama_pembekal']) ? $row['nama_pembekal'] : '';
if (!empty($nama_pembekal) && $nama_pembekal != '-') {
	$nama_pembekal2 = $nama_pembekal;
} else{
	$nama_pembekal2 = 'None';
}

$alamat_pembekal = isset($row['alamat_pembekal']) ? $row['alamat_pembekal'] : '';
if (!empty($alamat_pembekal) && $alamat_pembekal != '-') {
	$alamat_pembekal2 = $alamat_pembekal;
} else{
	$alamat_pembekal2 = 'None';
}

$emel_pembekal = isset($row['emel_pembekal']) ? $row['emel_pembekal'] : '';
if (!empty($emel_pembekal) && $emel_pembekal != '-') {
	$emel_pembekal2 = $emel_pembekal;
} else{
	$emel_pembekal2 = 'None';
}

$notel_pembekal = isset($row['notel_pembekal']) ? $row['notel_pembekal'] : '';
if (!empty($notel_pembekal) && $notel_pembekal != '-') {
	$notel_pembekal2 = $notel_pembekal;
} else{
	$notel_pembekal2 = 'None';
}

$status_aset = isset($row['status_aset']) ? $row['status_aset'] : '';

ob_start();

// if(!empty($lokasi_id) && ($lokasi_id != '-')){
// 	$sqlAP2 = "SELECT * FROM hrm_subunit WHERE id = $lokasi_id";
// 	$resultAP2 = mysqli_query($conn, $sqlAP2);

// 	if ($resultAP2 && mysqli_num_rows($resultAP2) > 0) {
// 		$row = mysqli_fetch_assoc($resultAP2);
// 		$lokasi_jabatan2 = $row['name'];
// 	} else {
// 			$lokasi_jabatan2 = "Tiada";
// 	}
// 	} else {
// 		$lokasi_jabatan2 = "Tiada";
// 	}
// $lokasi_id = isset($row['lokasi_jabatan']) ? $row['lokasi_jabatan'] : '';


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Asset Report');
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

$pdf->Write(0, 'Asset Details', '', 0, 'L', true, 0, false, false, 0);

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
// $idaset = $_REQUEST['id'];
// $sql = "SELECT *  FROM tbl_daftar_aset 
//  INNER JOIN tbl_pembekal 
//  ON tbl_daftar_aset.id_pembekal=tbl_pembekal.id_pembekal
//  INNER JOIN kategoritps 
//  ON tbl_daftar_aset.kategori_aset=kategoritps.id_kategori
//  WHERE tbl_daftar_aset.id=".$idaset;
//  $row_set = mysqli_query($conn2, $sql);
// $row = mysqli_fetch_array($row_set);
// $lokasi_id = $row['lokasi_jabatan'];

// $sql1 = "SELECT name FROM hrm_subunit
// 	WHERE id = $current_jab";
// $res1 = mysqli_query($conn, $sql1);
// $res12 = mysqli_fetch_array($res1);


$namaaset = ucwords($row['nama_aset']);
$debitOutput = '';
$debitOutput2 = '';
$debitOutput3 = '';
$tbl = <<<EOD
<table cellspacing="0" cellpadding="0" border="0" style="font-size:14px;">

	<tr>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td align="left" colspan="1" style="font-size:13;"><strong>Print Date: </strong> $tarikh</td>
		<td align="left" colspan="1" style="font-size:13;"><strong>Status: </strong> $status_aset</td>
	</tr>
	<tr>
		<td align="left" colspan="2" style="font-size:13;"><strong>Record for Aset Name: </strong> $namaaset</td>
	</tr>

</table>
EOD;

// var_dump($kategori_id);

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -------- view XHTML ---------------------------------------------------------
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

		if ($kategori_id == 32){ // kategori = komputer
			$debitOutput .= '
			<tr>
				<td align="left" colspan="1" style="font-size:13;"><strong>Category : </strong> '.ucwords(strtolower($row['nama_kategori'])).'</td>
				<td align="left" colspan="1" style="font-size:13;"><strong>Asset Type : </strong> '.ucwords(strtolower($row['jenis_aset'])).'</td>			
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td align="left"><strong>Registration Date</strong> : '.$row['tarikh_daftar'].'</td>
				<td align="left"><strong>Handover Date</strong> : '.$row['tarikh_serahan'].'</td>
			</tr>
			<tr>
				<td align="left"><strong>Asset Number</strong> : '.$row['no_aset'].'</td>	
				<td align="left"><strong>Staff Name</strong> : '.$nama_kakitangan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Serial Number</strong> : '.$no_siri2.'</td>
				<td align="left"><strong>Dept. Location</strong> : '.$lokasi_jabatan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Year of Purchase</strong> : '.$row['tahun_beli'].'</td>
				<td align="left"><strong>Purchase Price</strong> : '.'RM '.$row['harga_beli'].'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Warranty Period</strong> : '.ucwords(strtolower($warranty2)).'</td>
				<td align="left"><strong>Colour</strong> : '.ucwords(strtolower($warna2)).'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Model</strong> : '.$row['model'].'</td>	
			</tr>';
		}
		else if ($kategori_id == 33){ // kategori = perabot
			$debitOutput .= '
			<tr>
				<td align="left" colspan="1" style="font-size:13;"><strong>Category : </strong> '.ucwords(strtolower($row['nama_kategori'])).'</td>
				<td align="left" colspan="1" style="font-size:13;"><strong>Asset Type : </strong> '.ucwords(strtolower($row['jenis_aset'])).'</td>			
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td align="left"><strong>Registration Date</strong> : '.$row['tarikh_daftar'].'</td>
				<td align="left"><strong>Handover Date</strong> : '.$row['tarikh_serahan'].'</td>
			</tr>
			<tr>
				<td align="left"><strong>Asset Number</strong> : '.$row['no_aset'].'</td>
				<td align="left"><strong>Staff Name</strong> : '.$nama_kakitangan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Year of Purchase</strong> : '.$row['tahun_beli'].'</td>
				<td align="left"><strong>Dept. Location</strong> : '.$lokasi_jabatan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Purchase Price</strong> : '.'RM '.$row['harga_beli'].'</td>
				<td align="left"><strong>Colour</strong> : '.ucwords(strtolower($warna2)).'</td>
			</tr>
			<tr>
				<td align="left"><strong>Model</strong> : '.$row['model'].'</td>								
			</tr>';
		}
		else if ($kategori_id == 34){ // kategori = kelengkapan pejabat
			$debitOutput .= '
			<tr>
				<td align="left" colspan="1" style="font-size:13;"><strong>Category : </strong> '.ucwords(strtolower($row['nama_kategori'])).'</td>
				<td align="left" colspan="1" style="font-size:13;"><strong>Asset Type : </strong> '.ucwords(strtolower($row['jenis_aset'])).'</td>			
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td align="left"><strong>Registration Date</strong> : '.$row['tarikh_daftar'].'</td>
				<td align="left"><strong>Handover Date</strong> : '.$row['tarikh_serahan'].'</td>
			</tr>
			<tr>
				<td align="left"><strong>Asset Number</strong> : '.$row['no_aset'].'</td>
				<td align="left"><strong>Staff Name</strong> : '.$nama_kakitangan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Serial Number</strong> : '.$no_siri2.'</td>
				<td align="left"><strong>Dept. Location</strong> : '.$lokasi_jabatan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Year of Purchase</strong> : '.$row['tahun_beli'].'</td>
				<td align="left"><strong>Purchase Price</strong> : '.'RM '.$row['harga_beli'].'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Model</strong> : '.$row['model'].'</td>
				<td align="left"><strong>Colour</strong> : '.ucwords(strtolower($warna2)).'</td>		
			</tr>';
		}
		else if ($kategori_id == 35){ // kategori = peralatan
			$debitOutput .= '
			<tr>
				<td align="left" colspan="1" style="font-size:13;"><strong>Category : </strong> '.ucwords(strtolower($row['nama_kategori'])).'</td>
				<td align="left" colspan="1" style="font-size:13;"><strong>Asset Type : </strong> '.ucwords(strtolower($row['jenis_aset'])).'</td>			
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td align="left"><strong>Registration Date</strong> : '.$row['tarikh_daftar'].'</td>
				<td align="left"><strong>Handover Date</strong> : '.$row['tarikh_serahan'].'</td>
			</tr>
			<tr>
				<td align="left"><strong>Asset Number</strong> : '.$row['no_aset'].'</td>
				<td align="left"><strong>Staff Name</strong> : '.$nama_kakitangan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Serial Number</strong> : '.$no_siri2.'</td>
				<td align="left"><strong>Dept. Location</strong> : '.$lokasi_jabatan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Year of Purchase</strong> : '.$row['tahun_beli'].'</td>
				<td align="left"><strong>Purchase Price</strong> : '.'RM '.$row['harga_beli'].'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Warranty Period</strong> : '.ucwords(strtolower($warranty2)).'</td>
				<td align="left"><strong>Colour</strong> : '.ucwords(strtolower($warna2)).'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Model</strong> : '.$row['model'].'</td>	
			</tr>';
		}
		else if ($kategori_id == 36){ // kategori = kemudahan
			$debitOutput .= '
			<tr>
				<td align="left" colspan="1" style="font-size:13;"><strong>Category : </strong> '.ucwords(strtolower($row['nama_kategori'])).'</td>
				<td align="left" colspan="1" style="font-size:13;"><strong>Asset Type : </strong> '.ucwords(strtolower($row['jenis_aset'])).'</td>			
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td align="left"><strong>Registration Date</strong> : '.$row['tarikh_daftar'].'</td>
				<td align="left"><strong>Handover Date</strong> : '.$row['tarikh_serahan'].'</td>
			</tr>
			<tr>
				<td align="left"><strong>Asset Number</strong> : '.$row['no_aset'].'</td>
				<td align="left"><strong>Staff Name</strong> : '.$nama_kakitangan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Serial Number</strong> : '.$no_siri2.'</td>
				<td align="left"><strong>Dept. Location</strong> : '.$lokasi_jabatan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Year of Purchase</strong> : '.$row['tahun_beli'].'</td>
				<td align="left"><strong>Purchase Price</strong> : '.'RM '.$row['harga_beli'].'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Warranty Period</strong> : '.ucwords(strtolower($warranty2)).'</td>
				<td align="left"><strong>Colour</strong> : '.ucwords(strtolower($warna2)).'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Model</strong> : '.$row['model'].'</td>		
			</tr>';
		}
		else if ($kategori_id == 37){ // kategori = kenderaan
			$debitOutput .= '
			<tr>
				<td align="left" colspan="1" style="font-size:13;"><strong>Category : </strong> '.ucwords(strtolower($row['nama_kategori'])).'</td>
				<td align="left" colspan="1" style="font-size:13;"><strong>Asset Type : </strong> '.ucwords(strtolower($row['jenis_aset'])).'</td>			
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td align="left"><strong>Registration Date</strong> : '.$row['tarikh_daftar'].'</td>
				<td align="left"><strong>Handover Date</strong> : '.$row['tarikh_serahan'].'</td>
			</tr>
			<tr>
				<td align="left"><strong>Asset Number</strong> : '.$row['no_aset'].'</td>
				<td align="left"><strong>Staff Name</strong> : '.$nama_kakitangan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Plate Number</strong> : '.$no_siri2.'</td>
				<td align="left"><strong>Dept. Location</strong> : '.$lokasi_jabatan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Year of Purchase</strong> : '.$row['tahun_beli'].'</td>
				<td align="left"><strong>Purchase Price</strong> : '.'RM '.$row['harga_beli'].'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Model</strong> : '.$row['model'].'</td>
				<td align="left"><strong>Colour</strong> : '.ucwords(strtolower($warna2)).'</td>
			</tr>';
		}
		else{ // other kategori (future)
			$debitOutput .= '
			<tr>
				<td align="left" colspan="1" style="font-size:13;"><strong>Category : </strong> '.ucwords(strtolower($row['nama_kategori'])).'</td>
				<td align="left" colspan="1" style="font-size:13;"><strong>Asset Type : </strong> '.ucwords(strtolower($row['jenis_aset'])).'</td>			
			</tr>
			<tr>
				<td></td>
			</tr>
			<tr>
				<td align="left"><strong>Registration Date</strong> : '.$row['tarikh_daftar'].'</td>
				<td align="left"><strong>Handover Date</strong> : '.$row['tarikh_serahan'].'</td>
			</tr>
			<tr>
				<td align="left"><strong>Asset Number</strong> : '.$row['no_aset'].'</td>	
				<td align="left"><strong>Staff Name</strong> : '.$nama_kakitangan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Serial Number</strong> : '.$no_siri2.'</td>
				<td align="left"><strong>Dept. Location</strong> : '.$lokasi_jabatan2.'</td>
			</tr>
			<tr>
				<td align="left"><strong>Year of Purchase</strong> : '.$row['tahun_beli'].'</td>
				<td align="left"><strong>Purchase Price</strong> : '.'RM '.$row['harga_beli'].'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Warranty Period</strong> : '.ucwords(strtolower($warranty2)).'</td>
				<td align="left"><strong>Colour</strong> : '.ucwords(strtolower($warna2)).'</td>			
			</tr>
			<tr>
				<td align="left"><strong>Model</strong> : '.$row['model'].'</td>	
			</tr>';
		}
		
		// 			<td align="left"><strong>Cukai Jalan Tamat</strong> : '.$row['cukai_jalan'].'</td>

		$debitOutput2 .= '
		<tr>
			<td></td>
		</tr>
		<tr>
			<td align="left" colspan="2" style="font-size:13;"><strong>Supplier Information</strong> </td>			
		</tr>
		<tr>
			<td align="left"><strong>Name</strong> : '.$nama_pembekal2.'</td>
			<td align="left"><strong>Address</strong> : '.$alamat_pembekal2.'</td>			
		</tr>
		<tr>
			<td align="left"><strong>Email</strong> : '.$emel_pembekal2.'</td>
			<td align="left"><strong>Phone Number</strong> : '.$notel_pembekal2.'</td>			
		</tr>
		';


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
		<table cellspacing="1" cellpadding="2" border="0" width="100%">
					
        '.$debitOutput.'
        '.$debitOutput2.'
        '.$debitOutput4.'
		</table>
		';
		




$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

// ob_end_clean();
//============================================================+
// END OF FILE
//============================================================+

?>
