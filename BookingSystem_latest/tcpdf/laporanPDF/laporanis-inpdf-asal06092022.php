<?php
include('../../configis.php') ;
date_default_timezone_set('UTC');
session_start();
$idp = $_SESSION['idP'];
$lvl = $_SESSION['lvl'];

$firstname1 = $_SESSION['1stname'];
$lastname = $_SESSION['lastname'];
$empnumber = $_SESSION['empnumber'];
$department = $_SESSION['department'];
$namerole = $_SESSION['namerole'];
$tarikhBln = date('d-m-Y');


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8',false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Razliah Rahmat');
$pdf->SetTitle('MICTH');
$pdf->SetSubject('MICTH');
$pdf->SetKeywords('MICTH, Melaka, example, test, guide');

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
$pdf->AddPage('L', 'A4');

//$tarikh = date("d.m.Y");

$pdf->Write(0, 'Rekod Surat Masuk MICTH', '', 0, 'L', true, 0, false, false, 0);

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
       <td>Maklumat Dicetak Pada : $tarikhBln</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// -------- view XHTML ---------------------------------------------------------
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');


		if($lvl == "1")
		{
			$sqlvtp = mysql_query("SELECT * FROM tbl_surat_in ORDER BY id DESC");
		}else{
			$sqlvtp = mysql_query("SELECT * FROM tbl_surat_in ORDER BY id DESC");
		}
		
	if(mysql_fetch_array($sqlvtp) > 0 )
	{
	$debitOutput = "";
	$i = $offset + 1;
	while ($result=mysql_fetch_array($sqlvtp))
	{
		
	$z = $i-"0";
		$debitOutput .= '
		<tr>
			<td align="center">'.$i.'</td>
			<td align="center">'.$result['date'].'</td>
			<td align="left">'.$result['from_dpd'].'</td>
			<td align="left">'.$result['title'].'</td>
			<td align="left">'.$result['no_surat_pengirim'].'</td>
			<td align="left">'.$result['no_rujukan_micth'].'</td>
			<td align="left">'.$result['tindakan'].'</td>
			<td align="left">'.$result['status'].'</td>
		</tr>';
		$i++;
	}
	}else{
		
		$debitOutput .= '
		<tr>
			<td colspan="8" align="center">Tiada Rekod Surat Masuk Buat Masa Ini. </td>
			
		</tr>';
		
	}

$tbl = '
		<table cellspacing="1" cellpadding="2" border="1" width="100%">
			<tr style="background-color:#CEE3F6;color:#000000;">
				<td align="center" width="5%" ><strong>Bil</strong></td>
				<td align="center" width="7%" ><strong>Tarikh</strong></td>
				<td align="center" width="10%" ><strong>Daripada</strong></td>
				<td align="center" width="25%" ><strong>Perkara</strong></td>	
				<td align="center" width="20%" ><strong>No. Surat</strong></td>
				<td align="center" width="15%" ><strong>No. Rujukan</strong></td>
				<td align="center" width="10%" ><strong>Tindakan</strong></td>
				<td align="center" width="8%" ><strong>Status</strong></td>				
			</tr>
				'.$debitOutput.'
		</table>
		';
		

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
