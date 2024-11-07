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
$tarikh1 = $_REQUEST['tarikh1'];
$feri1 = $_REQUEST['feri1'];
$kodferi1 = $_REQUEST['kodferi1'];
$nameuser = $_REQUEST['nameuser'];

$jum50 = $_REQUEST['jum50'];
$jum40 = $_REQUEST['jum40'];
$jum10 = $_REQUEST['jum10'];

 
// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('i-Aset (MICTH)');
$pdf->SetSubject('PPSPM');
$pdf->SetKeywords('PPSPM, Melaka, example, test, guide');

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
$pdf->AddPage();

$tarikh = date("d.m.Y");

$pdf->Write(0, 'Laporan Senarai Kategori Berdaftar', '', 0, 'L', true, 0, false, false, 0);

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
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
    <tr>
     
    </tr>
	<tr>
		
	</tr>

</table>
EOD;

$tbl = <<<EOD
<table cellspacing="10" cellpadding="1" border="0" style="font-size:15px;">
    <tr>
       <td>Tarikh laporan dicetak : $tarikh</td>
    </tr>


</table>
EOD;

	/*<tr>
		<td>Feri : $feri1</td>
	</tr>*/


$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -------- view XHTML ---------------------------------------------------------
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// -----------------------------------------------------------------------------
/*if ($tarikh1<>"" && $kodferi1<>"")
{*/

	//$sqlferi = mysql_query("SELECT * FROM lib_feri WHERE nama_feri = '$feri1'");
	//if(mysql_numrows($sqlferi) > 0)
	//{
			
		//$rowferi = mysql_fetch_assoc($sqlferi);
		//$kodferi = $rowferi['kod_feri'];
			
			
		//$sqlvtp = mysql_query("SELECT * FROM departure T1 INNER JOIN lavel_penumpang T2 ON T1.lavel_p = T2.lavel_p WHERE T2.description_p = '$lavel_kp'");
		/*$sqlvtp = mysql_query("SELECT * FROM departure WHERE tarikh_berlepas = '$tarikh1' AND kod_feri = '$kodferi1' AND status = 'Pendaftaran Bagasi'");

		$debitOutput = "";
		$i = $offset + 1;
		while ($result=mysql_fetch_array($sqlvtp))
		{
		$debitOutput = '
		<tr>
			<td align="center">'.$i.'</td>
			<td align="left">&nbsp;&nbsp;&nbsp;'.$result['nama'].'</td>
			<td align="left">&nbsp;&nbsp;&nbsp;'.$result['passport_no'].' <br/>&nbsp;&nbsp;&nbsp;'.$result['ic_no'].'</td>
			<td align="left">&nbsp;&nbsp;&nbsp;'.$result['destinasi'].' <br/>&nbsp;&nbsp;&nbsp;'.$result['masa_berlepas'].'</td>
			<td align="center">'.$result['berat_bagasi'].'</td>
			<td align="center">'.$result['bayaran_bagasi'].'</td>
			<td align="left">&nbsp;&nbsp;&nbsp;'.$result['username'].'</td>
		</tr>';
		$i++;
		}
		*/
		
		

	$sqlvtp = mysql_query("SELECT nama_kategori FROM kategoritps");
	/*$sqlvtp = mysql_query("SELECT * FROM departure WHERE tarikh_berlepas = '$tarikh1' AND kod_feri = '$kodferi1' AND status = 'Pendaftaran Bagasi'");*/

	$debitOutput = "";
	$i = $offset + 1;
	while ($result=mysql_fetch_array($sqlvtp))
	{
		$debitOutput .= '
		<tr>
			<td align="center">'.$i.'</td>
			<td align="left">&nbsp;&nbsp;&nbsp;'.$result['nama_kategori'].'</td>

		</tr>';
		$i++;
	}
	
			/*<td align="left">&nbsp;&nbsp;&nbsp;'.$result['passport_no'].'<br/>&nbsp;&nbsp;&nbsp;'.$result['ic_no'].'</td>
			<td align="left">&nbsp;&nbsp;&nbsp;'.$result["destinasi"].'<br/>&nbsp;&nbsp;&nbsp;'.$result['masa_berlepas'].'</td>
			<td align="center">'.$result['berat_bagasi'].'</td>
			<td align="center">'.$result['bayaran_bagasi'].'</td>
			<td align="left">&nbsp;&nbsp;&nbsp;'.$result['username'].'</td>	*/	

			
		
	/*	$sqlcount = mysql_query("Select SUM(berat_bagasi) as beratbag, SUM(bayaran_bagasi) as bayarbag FROM departure WHERE tarikh_berlepas = '$tarikh1' AND kod_feri = '$kodferi' AND status = 'Pendaftaran Bagasi'");
		$rowsumbag = mysql_fetch_assoc($sqlcount);
		$debitOutput2 = '
		<tr>
			<td align="right" colspan="4"><strong>Jumlah Keseluruhan</strong></td>
			<td align="center"><strong>'.$rowsumbag['beratbag'].'</strong></td>
			<td align="center"><strong>'.$rowsumbag['bayarbag'].'</strong></td>	
			<td style="background-color:#CEE3F6;color:#000000;"></td>
		</tr>
		';
		*/
		
		
		/*$debitOutput3 = '
		<br/>
		<table>
		<tr><td></td><td width="300px" >
		<strong>'.$rowsumbag['beratbag'].'</strong>
		<strong>x</strong>
		<strong> RM1.00 = </strong>
		<strong>RM '.$rowsumbag['beratbag'].'.00</strong>
		<br/><br/>
		<strong>50% : PORTER = RM </strong>
		<strong>'.$jum50.'</strong>
		<br/>
		<strong>40% : '.$feri1.' = RM </strong>
		<strong>'.$jum40.'</strong>
		<br/>
		<strong>10% : PPSPM = RM </strong>
		<strong>'.$jum10.'</strong>
		</td><td></td><td></td><td></td><td></td></tr></table>
		';
		*/
		
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
//}

$tbl = '
		<table cellspacing="1" cellpadding="2" border="1" width="100%">
			<tr style="background-color:#CEE3F6;color:#000000;">
				<td align="center" width="15%"><strong>Bil.</strong></td>
				<td align="center" width="85%"><strong>Senarai Nama Kategori</strong></td>
								
			</tr>




			
				'.$debitOutput.'
				'.$debitOutput4.'
		</table>
		';
		
		        /*<td align="center" width="5%"><strong>Bil.</strong></td>
				<td align="center" width="20%"><strong>Senarai Nama Kategori</strong></td>
				<td align="center" width="15%"><strong>No. Passport / No. Kad Pengenalan</strong></td>
				<td align="center" width="15%"><strong>Destinasi / <br/>Masa Berlepas</strong></td>
				<td align="center" width="10%"><strong>Berat Bagasi <br/>(KG)</strong></td>
				<td align="center" width="10%"><strong>Jumlah Bayaran (RM)</strong></td>
				<td align="center" width="20%"><strong>Nama Petugas</strong></td>*/		
		
		
		
		
		        /*'.$debitOutput.'
                '.$debitOutput2.'	
				'.$debitOutput3.'
				'.$debitOutput4.'*/
		
		
		
/*<table cellspacing="1" cellpadding="2" border="1" width="100%">
			<tr style="background-color:#CEE3F6;color:#000000;">
				<td align="center" width="5%"><strong>Bil.</strong></td>
				<td align="center" width="20%"><strong>Senarai Kategori</strong></td>
				<td align="center" width="15%"><strong>No. Passport / No. Kad Pengenalan</strong></td>
				<td align="center" width="15%"><strong>Destinasi / <br/>Masa Berlepas</strong></td>
				<td align="center" width="10%"><strong>Berat Bagasi <br/>(KG)</strong></td>
				<td align="center" width="10%"><strong>Jumlah Bayaran (RM)</strong></td>
				<td align="center" width="20%"><strong>Nama Petugas</strong></td>*/	



$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
